<template>
  <v-container>
    <v-row justify="center">
      <v-col cols="12" md="6">
        <form @submit.prevent="calculateLoad">
          <v-text-field
              v-model="numCargoUnits"
              :counter="10"
              :rules="numCargoUnitsRules"
              label="Введите количество коробок"
          ></v-text-field>
          <v-text-field
              v-model="truckType"
              :counter="3"
              :rules="truckTypeRules"
              label="Введите тип автомобиля (16, 20, 25)"
          ></v-text-field>

          <v-btn
              class="mr-4"
              type="submit"
          >
            Расчет
          </v-btn>
        </form>

        <div v-if="result">
          <h3>Результаты:</h3>
          <p>Объем товаров: {{ result.totalVolume }} куб.</p>
          <p>Количество паллет: {{ result.palletsUsed }} шт.</p>
          <p>Оставшееся место в машине: {{ result.remainingSpace }} куб.</p>
        </div>

        <div v-if="error" class="error-message">
          <div v-if="typeof error === 'string'">{{ error }}</div>
          <ul v-else>
            <li v-for="(messages, field) in error" :key="field">
              {{ field }}:
              <ul>
                <li v-for="message in messages" :key="message">{{ message }}</li>
              </ul>
            </li>
          </ul>
        </div>
      </v-col>
    </v-row>
  </v-container>

</template>

<script>

export default {
  name: 'TruckLoad',
  data() {
    return {
      numCargoUnits: '',
      truckType: '',
      result: null,
      error: null,
      numCargoUnitsRules: [
        v => !!v || 'Количество коробок обязательно к заполнению',
        v => !isNaN(parseInt(v)) || 'Количество коробок должно быть числом'
      ],
      truckTypeRules: [
        v => !!v || 'Тип автомобиля обязателен к заполнению',
        v => !isNaN(parseInt(v)) || 'Тип автомобиля должен быть числом'
      ]
    };
  },
  methods: {
    validateInput() {
      const numCargoUnits = parseInt(this.numCargoUnits);
      const truckType = parseInt(this.truckType);
      if (isNaN(numCargoUnits) || isNaN(truckType)) {
        this.error = 'Пожалуйста, введите корректные числа.';
        return false;
      }
      return { numCargoUnits, truckType };
    },
    calculateLoad() {
      this.error = null;
      this.result = null;
      const validatedInput = this.validateInput();
      if (!validatedInput) return;

      axios.post('/api/v1/calculate/truck-load', validatedInput)
          .then(response => {
            this.result = response.data;
          })
          .catch(error => {
            console.error('Ошибка при расчете загрузки:', error);
            if (error.response && error.response.data && error.response.data.errors) {
              this.error = error.response.data.errors;
            } else {
              this.error = 'Произошла ошибка при запросе к серверу.';
            }
          });
    }
  }
};
</script>
