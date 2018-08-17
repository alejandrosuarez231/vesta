<template>
  <table class="table" style="font-size: 0.9em;" v-cloak>
    <thead>
      <tr>
        <th class="">#</th>
        <th class="">Tipo</th>
        <th class="">SubTipo</th>
        <th class="text-right"  width="18%">Cantidad</th>
        <th><a class="btn btn-link" href="#" title="Agregar" @click="addRowMTP(this.app.mtps.length -1)"><i class="fas fa-plus"></i></a></th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(mtp, index) in mtps" track-by="index">
        <td>
          {{ index + 1 }}
          <input type="hidden" name="mtp_id[]" :value="mtp.mtp_id">
          <input type="hidden" name="mtp_producto_id[]" :value="mtp.mtp_producto_id">
        </td>
        <td>
          <select name="mtp_tipo_id[]" class="form-control form-control-sm" v-model="mtp.mtp_tipo_id" @change="getSubtipoMTP(index,mtps[index].mtp_tipo_id)" required>
            <option v-for="tipo in mtp_tipos" :value="tipo.value">{{ tipo.label }}</option>
          </select>
        </td>
        <td>
          <select name="mtp_subtipo_id[]" class="form-control form-control-sm" v-model="mtp.mtp_subtipo_id" required>
            <option v-for="subtipo in mtp_subtipos[index]" :value="subtipo.value">{{ subtipo.label }}</option>
          </select>
        </td>
        <td>
          <input type="number" name="mtp_cantidad[]" class="form-control form-control-sm text-right" value="" min="1" v-model="mtp.mtp_cantidad" required>
        </td>
        <td>
          <a class="btn btn-link text-danger" href="#" title="Eliminar" @click="removeRowMTP(index)" v-if="mtps.length > 1"><i class="fas fa-minus"></i></a>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  props: ['mtps','mtp_tipos','mtp_subtipos'],
  mounted() {
    console.log('Component MTPS mounted.')
  },

  watch: {},

  methods: {
    addRowMTP: function (index) {
      this.mtps.splice(index + 1, 1, { mtp_tipo_id: null, mtp_subtipo_id: null, mtp_cantidad: 0 });
    },
    removeRowMTP: function(index){
        // console.log(index);
        if( this.mtps.length > 1){
          this.mtps.splice(index, 1);
        }
      },
      getSubtipoMTP: function(index,tipo){
        axios.get('/mtpsubtipos/' + tipo)
        .then( response => {
          console.log(response.data);
          this.mtp_subtipos.splice(index, 1, response.data);
        })
      }
    }
  }
  </script>