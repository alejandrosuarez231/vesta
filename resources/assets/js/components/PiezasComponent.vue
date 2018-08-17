<template>
  <table class="table" style="font-size: 0.8em;" v-cloak>
    <thead class="font-weight-bold">
      <tr>
        <td>Material</td>
        <td>Descripcion</td>
        <td>Largo</td>
        <td>Ancho</td>
        <td>Espesor</td>
        <td>LargoIZQ</td>
        <td>LargoDER</td>
        <td>AnchoSUP</td>
        <td>AnchoINF</td>
        <td width="8%">Mec1</td>
        <td width="8%">Mec2</td>
        <td width="5%">Cantidad</td>
        <td>
          <a class="btn btn-link float-right" href="#" title="Agregar"><i class="fas fa-plus"></i></a>
        </td>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(material, index) in materiales" track-by="index">
        <td>
          <select class="form-control form-control-sm" name="material_id[]" v-model="material.material_id" @change="setDescripcion(this.materiales[index].material_id,index)">
            <option v-for="item in materialist" :value="item.value">{{ item.label }}</option>
          </select>
        </td>
        <td>
          <select class="form-control form-control-sm" name="psedescripcion[]" v-model="material.descripcion_id">
            <option v-for="descripcion in descripciones[index]" :value="descripcion.value">{{ descripcion.label }}</option>
          </select>
        </td>
        <td>
          <input class="form-control form-control-sm text-uppercase" type="text" name="pselargo[]" value="" autocomplete="off" v-model="material.largo">
        </td>
        <td>
          <input class="form-control form-control-sm text-uppercase" type="text" name="pseancho[]" value="" autocomplete="off" v-model="material.ancho">
        </td>
        <td>
          <select class="form-control form-control-sm" name="pseespesor[]" v-model="material.espesor">
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="6">6</option>
            <option value="10">10</option>
            <option value="12">12</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="25">25</option>
          </select>
        </td>
        <td>
          <select class="form-control form-control-sm" name="pselargo_izq[]" v-model="material.largo_izq">
            <option value="0.45">0.45</option>
            <option value="1">1</option>
            <option value="2">2</option>
          </select>
        </td>
        <td>
          <select class="form-control form-control-sm" name="pselargo_der[]" v-model="material.largo_der">
            <option value="0.45">0.45</option>
            <option value="1.00">1</option>
            <option value="2.00">2</option>
          </select>
        </td>
        <td>
          <select class="form-control form-control-sm" name="pseancho_sup[]" v-model="material.ancho_sup">
            <option value="0.45">0.45</option>
            <option value="1">1</option>
            <option value="2">2</option>
          </select>
        </td>
        <td>
          <select class="form-control form-control-sm" name="pseancho_inf[]" v-model="material.ancho_inf">
            <option value="0.45">0.45</option>
            <option value="1">1</option>
            <option value="2">2</option>
          </select>
        </td>
        <td>
          <input class="form-control form-control-sm text-uppercase mb-1" type="text" name="psemec1[]" value="" autocomplete="off" v-model="material.mec1">
        </td>
        <td>
          <input class="form-control form-control-sm text-uppercase mb-1" type="text" name="psemec2[]" value="" autocomplete="off" v-model="material.mec2">
        </td>
        <td>
          <input class="form-control form-control-sm text-right" type="number" name="psecantidad[]" value="" min="1" v-model="material.cantidad">
        </td>
        <td>
          <a class="btn btn-link text-danger" href="#" title="Eliminar"><i class="fas fa-minus"></i></a>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {

  props: ['tipo','subtipo','materiales'],

  mounted() {
    console.log('Component Materiales mounted. ')
  },

  data: function(){
    return {
      materialist: [],
      descripciones: []
    }
  },

  watch: {
    materiales: function(){
      if(this.materiales.length > 0){
        axios.get('/setMaterial/' + this.tipo + '/' + this.subtipo).then(response => { this.materialist = response.data }).catch(function(error){ console.log(error) });
      }
      for (var i = 0; i < this.materiales.length; i++) {
        this.setDescripcion(this.materiales[i].material_id,i);
      }
      console.log(this.descripciones);
    }
  },

  methods: {
    setDescripcion: function(material, index){
      axios.get('/descripcionMaterial/' + material)
      .then(response => {
        this.descripciones.splice(index, 1, response.data);
      })
      .catch(function(error){
        console.log(error)
      })
    }
  }
}
</script>