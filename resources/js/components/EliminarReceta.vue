<template>
  <input
    type="submit"
    href=""
    class="btn btn-danger d-block w-100 mb-2"
    value="Eliminar ×"
    @click="eliminarReceta"
  />
</template>

<script>
export default {
  props: ["recetaId"],
  methods: {
    eliminarReceta() {
      this.$swal({
        title: "¿Estas seguro que deseas eliminar?",
        text: "¡Una vez eliminada, no se puede recuperar!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si",
        cancelButtonText: "¡NO!",
      }).then((result) => {
        if (result.isConfirmed) {
          const params = {
            id: this.recetaId,
          };

          // enviar la petición
          axios
            .post(`/recetas/${this.recetaId}`, { params, _method: "DELETE" })
            .then((resp) => {
              this.$swal({
                title: "Receta eliminada!",
                text: "Se elimino la receta correctamente",
                icon: "success",
              });

              // Eliminar receta del DOM
              this.$el.parentNode.parentNode.parentNode.removeChild(
                this.$el.parentNode.parentNode
              );
            })
            .catch((err) => {
              console.log(err);
            });
        }
      });
    },
  },
};
</script>
