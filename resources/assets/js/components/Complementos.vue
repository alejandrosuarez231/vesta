<template>
  <div class="form-group">
        <legend>Complementos</legend>
        <div class="form-group">
          <table class="table" style="font-size: 0.9em;">
            <thead>
              <tr>
                <th width="2%">Item</th>
                <th>Tipo</th>
                <th>SubTipo</th>
                <th>Cantidad</th>
                <th><a class="btn btn-link" href="#" title="Agregar" @click="addRowMTP(this.app.mtps.length -1)"><i class="fas fa-plus"></i></a></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(mtp, $index) in mtps" track-by="$index">
                <td>{{ $index + 1  }}</td>
                <td>
                  <select class="form-control form-control-sm" name="mtp_tipo_id[]" v-model="mtp.tipo">
                    <option v-for="(tipo, indice) in tipos" :value="tipo.value">{{ tipo.label }}</option>
                  </select>
                </td>
                <td>
                  <select class="form-control form-control-sm" name="mtp_subtipo_id[]" v-model="mtp.subtipo">
                  <option value="" selected disabled>Subtipo</option>
                  <option v-for="(subtipo, indice) in subtipos[$index]" :value="subtipos.value">{{ subtipo.label }}</option>
                </select>
                </td>
                <td width="30%">
                  <input class="form-control form-control-sm text-right" type="number" name="mtp_cantidad[]" min="1" v-model="mtp.cantidad">
                </td>
                <td>
                  <a class="btn btn-link text-danger" href="#" title="Eliminar" @click="removeRowMTP($index)" v-if="mtps.length > 1"><i class="fas fa-minus"></i></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</template>

<script>
export default {
  data(){
    mtps: [{ tipo: '', subtipo: '', cantidad: ''}]
  },
  created: {
    axios.get('/TiposMTP').then( response => { this.tipos = response.data }).catch(function(error) { console.log(error)});
  },
  watch: {
    mtp.tipo(){
      console.log(this.mtp.tipo);
    }
  },
  methods: {
    addRowMTP(index) {
        this.mtps.splice(index + 1, 1, { tipo: null, subtipo: null, cantidad: 0 });
      },
      removeRowMTP(index){
        console.log(index);
        if( this.mtps.length > 1){
          this.mtps.splice(index, 1);
        }
      }
  }
}
</script>