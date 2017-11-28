<template>
	<div>
		<h1>Create A Failure</h1>
		<form v-on:submit.prevent="addFailure">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Agent Id:</label>
						<input type="text" class="form-control" v-model="failure.agent_id">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Failure Comment:</label>
						<input type="text" class="form-control col-md-6" v-model="failure.comment" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Failure Date:</label>
						<input type="text" class="form-control col-md-6" v-model="failure.registered_at" />
					</div>
				</div>
			</div><br />
			<div class="form-group">
				<button class="btn btn-primary">Add Failure</button>
			</div>
		</form>
	</div>
</template>
<script>
  export default {
    data(){
        return{
          failure:{}
        }
    },
    methods: {
      addFailure(){
        let uri = 'http://backoffice.dev/failures';
        this.axios.post(uri, this.failure).then((response) => {
          this.$router.push({name: 'DisplayFailure'})
        })
    }
  }
}
</script>