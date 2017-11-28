<template>
    <div>
        <h1>Update Failure</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2"><router-link :to="{ name: 'DisplayFailure' }" class="btn btn-success">Return to Failures</router-link></div>
        </div>

        <form v-on:submit.prevent="updateFailure">
            <div class="form-group">
                <label>Agent ID</label>
                <input type="text" class="form-control" v-model="failure.agent_id">
            </div>

            <div class="form-group">
                <label name="product_comment">Failure Comment</label>
                <input type="text" class="form-control" v-model="failure.comment">
            </div>

            <div class="form-group">
                <label name="product_time">Failure Time</label>
                <input type="text" class="form-control" v-model="failure.registered_at">
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</template>

<script>

    export default{
        data(){
            return{
                failure:{}
            }
        },

        created: function(){
            this.getFailure();
        },

        methods: {
            getFailure()
            {
              let uri = `http://backoffice.dev/failures/${this.$route.params.id}/edit`;
                this.axios.get(uri).then((response) => {
                    this.failure = response.data;
                });
            },

            updateFailure()
            {
              let uri = 'http://backoffice.dev/failures/'+this.$route.params.id;
                this.axios.patch(uri, this.failure).then((response) => {
                  this.$router.push({name: 'DisplayFailure'});
                });
            }
        }
    }
</script>
