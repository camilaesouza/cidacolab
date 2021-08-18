<template>
  <div id="address-component">
    <div v-show="!isRegistering" class="form-group" :class="{'has-danger' : hasErrors('type') }">
      <label class="form-control-label">
        Nome *
      </label>

      <input
        type="text"
        :name="getFieldName('type')"
        v-model="address.type"
        :class="{'form-control-danger' : hasErrors('type') }"
        class="form-control"
        @click="clearErrorOnFocus('type')"
        @focus="clearErrorOnFocus('type')">
      <span v-show="!isRegistering" class="help-block text-muted"><small>Identificação do endereço, ex.: Armazém, Comercial, Galpão...</small></span>

      <input
        type="hidden"
        :name="getFieldName('type')"
        :value="this.address.type ? this.address.type : 'Principal'"
        v-if="isRegistering"
        :class="{'form-control-danger' : hasErrors('type') }">

      <div v-if="hasErrors('type')" class="form-control-feedback">
        {{ this.getErrorMessage('type') }}
      </div>
    </div>

    <div class="form-group" :class="{'has-danger' : hasErrors('cep') }">
      <label class="form-control-label">
        CEP *
      </label>

      <input
        ref="zipCode"
        type="text"
        :name="getFieldName('cep')"
        v-mask="'#####-###'"
        v-model="address.zip_code"
        :class="{'form-control-danger' : hasErrors('cep') }"
        class="form-control"
        @click="clearErrorOnFocus('cep')"
        @focus="clearErrorOnFocus('cep')">
      <div v-if="hasErrors('cep')" class="form-control-feedback">
        {{ this.getErrorMessage('cep') }}
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-md-8">
        <div class="form-group" :class="{'has-danger' : hasErrors('street_avenue') }">
          <label class="form-control-label">
            Rua/Avenida *
          </label>

          <input
            type="text"
            :name="getFieldName('street_avenue')"
            class="form-control"
            :class="{'form-control-danger' : hasErrors('street_avenue') }"
            v-model="address.street_avenue"
            @click="clearErrorOnFocus('street_avenue')"
            @focus="clearErrorOnFocus('street_avenue')">

          <div v-if="hasErrors('street_avenue')" class="form-control-feedback">
            {{ this.getErrorMessage('street_avenue') }}
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="form-group" :class="{'has-danger' : hasErrors('number') }">
          <label class="form-control-label">
            Número *
          </label>

          <input
            type="text"
            ref="addressNumber"
            :name="getFieldName('number')"
            class="form-control"
            :class="{'form-control-danger' : hasErrors('number') }"
            v-model="address.number"
            @click="clearErrorOnFocus('number')"
            @focus="clearErrorOnFocus('number')">

          <div v-if="hasErrors('number')" class="form-control-feedback">
            {{ this.getErrorMessage('number') }}
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="form-group" :class="{'has-danger' : hasErrors('district') }">
          <label class="form-control-label">
            Bairro *
          </label>

          <input
            type="text"
            :name="getFieldName('district')"
            class="form-control"
            :class="{'form-control-danger' : hasErrors('district') }"
            v-model="address.district"
            @click="clearErrorOnFocus('district')"
            @focus="clearErrorOnFocus('district')">

          <div v-if="hasErrors('district')" class="form-control-feedback">
            {{ this.getErrorMessage('district') }}
          </div>
        </div>
      </div>
      <div class="col">
        <div class="form-group" :class="{'has-danger' : hasErrors('complement') }">
          <label class="form-control-label">
            Complemento
          </label>

          <input
            type="text"
            :name="getFieldName('complement')"
            class="form-control"
            :class="{'form-control-danger' : hasErrors('complement') }"
            v-model="address.complement"
            @click="clearErrorOnFocus('complement')"
            @focus="clearErrorOnFocus('complement')">

          <div v-if="hasErrors('complement')" class="form-control-feedback">
            {{ this.getErrorMessage('complement') }}
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="form-group" :class="{'has-danger' : hasErrors('state') }">
          <label class="form-control-label">
            Estado *
          </label>

          <select
            :name="getFieldName('state')"
            class="form-control" v-model="stateSelected"
            :class="{'form-control-danger' : hasErrors('state') }"
            @click="clearErrorOnFocus('state')"
            @focus="clearErrorOnFocus('state')">
            <option
              v-for="state in states"
              :key="state.id"
              :value="state.value">
              {{ state.text }}
            </option>
          </select>

          <div v-if="hasErrors('state')" class="form-control-feedback">
            {{ this.getErrorMessage('state') }}
          </div>
        </div>
      </div>
      <div class="col">
        <div class="form-group" :class="{'has-danger' : hasErrors('city_id') }">
          <label class="form-control-label">
            Cidade *
          </label>

          <select
            :name="getFieldName('city_id')"
            :class="{'form-control-danger' : hasErrors('city_id') }"
            class="form-control"
            v-model="citySelected"
            @click="clearErrorOnFocus('city_id')"
            @focus="clearErrorOnFocus('city_id')">
            <option
              v-for="city in cities"
              :key="city.id"
              :value="city.value">
              {{ city.text }}
            </option>
          </select>

          <div v-if="hasErrors('city_id')" class="form-control-feedback">
            {{ this.getErrorMessage('city_id') }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import AddressService from '../services/AddressServices';

export default {
  name: "address-component",

  props: {
    edit: {
      required: false,
    },
    errorsBag: {
      required: true,
    },
    old: {
      required: true,
    },
    isRegistering: {
      type: Boolean,
      default: false,
    },
    prefix: {
      type: String,
    },
  },

  mounted() {
    let vm = this;
    let zipCode = this.$refs.zipCode;
    $(zipCode).focus(function() {
      vm.address.zip_code = $(zipCode).val();
    })
    $('#address-component')
      .find('input')
      .focus(function () {
        $(this)
          .closest('.form-group')
          .removeClass('has-danger');
      });
  },

  data() {
    return {
      states: [],
      stateSelected: null,
      citySelected: null,
      cities: [],
      address: {
        type: this.getOld('type'),
        street_avenue: this.getOld('street_avenue'),
        district: this.getOld('district'),
        city_id: this.getOld('city_id'),
        zip_code: this.getOld('cep'),
        number: this.getOld('number'),
        complement: this.getOld('complement'),
        state: this.getOld('state'),
      },
    }
  },

  created() {
    this.getStates().then(success => {
      this.states = success.data.map(element => {
        return {
          text: element.name,
          value: element.abbr,
        };
      });
    }).then(() => {
      if (this.edit) {
        this.address.type = this.edit.type;
        this.address.street_avenue = this.edit.street_avenue;
        this.address.district = this.edit.district;
        this.address.city_id = this.edit.city_id;
        this.address.zip_code = this.edit.cep;
        this.address.number = this.edit.number;
        this.address.complement = this.edit.complement;
        this.address.state = this.edit.state.abbr;
      }

      if (this.address.state) {
        this.stateSelected = this.address.state;
      }
    });
  },

  watch: {
    stateSelected: function() {
      this.getCities().then(success => {
        this.cities = success.data.map(element => {
          return {
            text: element.name,
            value: element.id
          };
        });
      }).then(() => {
        if (this.address.city_id) {
          const city = this.cities.find(
            city => city.text === this.address.city_id || city.value === parseInt(this.address.city_id)
          );
          this.citySelected = (!!city) ? city.value : null;
        }
      });
    },

    'address.zip_code' () {
      this.getCEP();
    },
  },

  methods: {
    getOld(name) {
      let value = ''

      if (this.prefix) {
        if (this.old[this.prefix]) {
          value = this.old[this.prefix][name];
        }
      }

      value = (value == '') ? this.old[name] : value;

      return value;
    },

    getFieldPath(name) {
      if (!!(this.prefix))
        return `${this.prefix}.${name}`;

      return name;
    },

    getFieldName(name) {
      if (this.prefix) {
        return `${this.prefix}[${name}]`;
      }

      return name;
    },

    getErrorMessage(name) {
      name = this.getFieldPath(name);

      return this.errorsBag[name].toString();
    },

    hasErrors(name) {
      name = this.getFieldPath(name);

      return !!(this.errorsBag[name]);
    },

    getCEP() {
      if (this.address.zip_code && this.address.zip_code.length == 9) {
        this.getAddress(this.address.zip_code.replace('-', '')).then((success) => {
          let data = success.data;
          if (!data.error && !this.edit) {
            this.setAddress(data);
            this.$refs.addressNumber.focus();
            this.clearErrorOnFocus();
          }
        }).catch((error) => {
          this.$snotify.error(`Ocorreu um erro ao buscar CEP: ${error}`);
        });
      }
    },

    setAddress(data) {
      this.address.street_avenue = data.logradouro;
      this.address.district = data.bairro;
      this.address.city_id = data.localidade;
      this.address.state = data.uf;

      this.stateSelected = data.uf;
    },

    getAddress(cep) {
      return AddressService.getAddressForCep(cep);
    },

    getStates() {
      return AddressService.getStates();
    },

    getCities() {
      return AddressService.getCitiesFor(this.stateSelected);
    },

    clearErrorOnFocus(name = null) {
      if(!!name) {
        name = this.getFieldPath(name);
        this.errorsBag[name] = undefined;
      } else {
        let names = [
          'type',
          'cep',
          'street_avenue',
          'number',
          'district',
          'complement',
          'state',
          'city_id'
        ];
        names.forEach((name) => {
          let atual = this.getFieldPath(name);
          this.errorsBag[atual] = undefined;
        });
      }
    }
  }
}
</script>
