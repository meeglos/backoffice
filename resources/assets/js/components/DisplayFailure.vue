<template>
    <div>
        <h1>Fallos en aplicaciones</h1>

        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'CreateFailure' }" class="btn btn-primary">Create Failure</router-link>
          </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <td>ID</td>
                <td>Agent ID</td>
                <td>Failure Comment</td>
                <td>Failure Date</td>
                <td>Actions</td>
            </tr>
            </thead>

            <tbody>
                <tr v-for="failure in failures">
                    <td>{{ failure.id }}</td>
                    <td>{{ failure.agent_id }}</td>
                    <td>{{ failure.comment }}</td>
                    <td>{{ failure.registered_at }}</td>
                    <td><router-link :to="{name: 'EditFailure', params: { id: failure.id }}" class="btn btn-primary">Edit</router-link></td>
                    <td><button class="btn btn-danger" v-on:click="deleteFailure(failure.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

    export default {
        data(){
            return{
                failures: []
            }
        },

        created: function()
        {
            this.fetchFailures();
        },

        methods: {
            fetchFailures()
            {
              let uri = 'http://backoffice.dev/failures';
              this.axios.get(uri).then((response) => {
                  this.failures = response.data;
              });
            },
            deleteFailure(id)
            {
              let uri = `http://backoffice.dev/failures/${id}`;
              this.failures.splice(id, 1);
              this.axios.delete(uri);
            }
        }
    }
</script>