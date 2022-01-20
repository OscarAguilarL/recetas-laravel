<template>
  <div>
    <span
      @click="handleLike"
      class="like-btn"
      :class="{ 'like-active': this.isActive }"></span>

      <p>{{ cantidadLikes }} les gustó esta receta</p>
  </div>
</template>

<script>
export default {
  props: ['recetaId', 'like', 'likes'],
  data: function () {
    return {
      isActive: this.like,
      totalLikes: this.likes,
    }
  },
  methods: {
    handleLike() {
      axios.post(`/recetas/${this.recetaId}`)
          .then((resp) =>{
              (resp.data.attached.length > 0)
                ? this.$data.totalLikes++
                : this.$data.totalLikes--;
              this.isActive = !this.isActive;
            })
          .catch(error => {
            if(error.response.status === 401) {
              window.location = '/register';
            }
          })
    }
  },
  computed: {
    cantidadLikes: function () {
      return this.totalLikes;
    },
  }
};
// $('.like-btn').on('click', function() {
//    $(this).toggleClass('like-active');
// });
</script>
