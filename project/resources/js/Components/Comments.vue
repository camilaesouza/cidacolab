<template>
  <div>
    <div class="col-12">
      <div class="form-group">
        <label for="comment">Comentários</label>
        <textarea type="text"
                  name="comment"
                  maxlength="500"
                  class="form-control"
                  id="comment" placeholder="Escreva um comentario"
                  v-model="comment">
        </textarea>
      </div>

      <button @click="createComment()" class="btn btn-primary">Enviar</button>
    </div>

    <div class="col-12 mt-4" v-for="(item, index) in displayedComments" :key="`comment-${item.id}`">
      <div class="form-group d-flex">
        <i style="font-size: 50px" class="fa fa-user mr-3"></i>
        <textarea type="text"
                  maxlength="500"
                  class="form-control"
                  id="commentUser"
                  :value="item.comment"
                  disabled>
        </textarea>
        <button @click="deleteComment(item)" class="btn btn-danger">Deletar</button>
      </div>
    </div>

    <div class="row">
      <div class="col-3 col-sm-3 col-md-3">
        <button
            type="button"
            class="btn btn-light btn-block"
            v-if="currentPage != 1"
            @click="changePreviousPage()">
          &laquo; Anterior
        </button>
      </div>

      <div class="text-center col-6 col-sm-6 col-md-6">
        <div class="custom-pagination">
          <div class="row center mt-2 mt-lg-0 mb-2">
            <div class="col">
              <button
                  class="btn btn-light"
                  type="button"
                  v-for="pageNumber in pages"
                  v-if="pages.length > 1"
                  :class="{'active': pageNumber == currentPage}"
                  @click="currentPage = pageNumber">
                {{ pageNumber }}
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-3 col-sm-3 col-md-3">
        <button
            type="button"
            @click="changeNextPage()"
            v-if="currentPage < pages.length"
            class="btn btn-light btn-block">
          Próximo &raquo;
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'comments',

  props: {
    complaintId: Number,
  },

  data() {
    return {
      comments: [],
      currentPage: 1,
      perPage: 5,
      pages: [],
      isLoading: true,
      comment: null,
    };
  },

  methods: {
    createComment() {
      let payload = {
        comment: this.comment
      };

      axios.post(`/complaints/comments/create/${this.complaintId}`, payload)
          .then((response) => {
            this.$snotify[response.data.type](response.data.message);
            this.comment = null;
            this.getComments();
          }).catch((error) => {
        let errors = error.response.data.errors;
        for (let key in errors) {
          this.$snotify.error(errors[key][0]);
        }
      });
    },

    deleteComment(comment) {
      let payload = {
        comment: comment
      };

      axios.post(`/complaints/comments/destroy/`, payload)
          .then((response) => {
            this.$snotify[response.data.type](response.data.message);

            this.getComments();
          }).catch((error) => {
        let errors = error.response.data.errors;
        for (let key in errors) {
          this.$snotify.error(errors[key][0]);
        }
      });
    },

    getComments() {
      this.isLoading = true;
      axios.get(`/complaints/comments/list/${this.complaintId}`).then((response) => {
        if (response && response.data) {
          this.comments = response.data;
        }
        this.isLoading = false;
      });
    },

    setPages() {
      const numberOfPages = Math.ceil(this.comments.length / this.perPage);
      this.pages = [];
      for (let index = 1; index <= numberOfPages; index++) {
        this.pages.push(index);
      }
    },

    paginate(comments) {
      const currentPage = this.currentPage;
      const perPage = this.perPage;
      const from = (currentPage * perPage) - perPage;
      const to = (currentPage * perPage);
      return comments.slice(from, to);
    },

    changeNextPage() {
      if (this.currentPage + 1 > this.pages.length) {
        this.currentPage = this.pages.length;
      } else {
        this.currentPage++;
      }
    },

    changePreviousPage() {
      if (this.currentPage - 1 < 1) {
        this.currentPage = 1;
      } else {
        this.currentPage--;
      }
    },
  },

  mounted() {
    this.getComments();
  },

  watch: {
    comments() {
      this.setPages();
    },
  },

  computed: {
    displayedComments() {
      return this.paginate(this.comments);
    },
  },
};
</script>

<style scoped>
</style>
