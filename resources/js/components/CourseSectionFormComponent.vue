<template>
	<b-form @submit="validateForm" method="post" action="./">
		<b-row cols="12" col-md="6">
			<b-col>
				<label for="title">Title</label>
				<b-input
					v-model="title"
					:state="validTitle"
					id="title"
					name="title"
				>
				</b-input>
				<b-form-invalid-feedback :state="validTitle">
					Course title must be 6-64 characters long.
				</b-form-invalid-feedback>
				<b-form-valid-feedback :state="validTitle">
					Looks Good.
				</b-form-valid-feedback>
			</b-col>
		</b-row>
		<b-row class="mt-4">
			<b-col class="text-right">
				<b-button
					variant="secondary"
					:href="'/course/' + course_id + '/section'"
					size="big"
				>
					Cancel
				</b-button>
				<b-button variant="primary" size="big" type="submit">
					Confirm
				</b-button>
			</b-col>
		</b-row>
		<input type="hidden" name="_method" value="PUT" v-if="editing">
		<input type="hidden" name="_token" :value="csrf">
	</b-form>
</template>


<script>
export default {
	props: ['course_id', 'section'],
	data: () => {
		return {
			editing: false,
			title: '',
			description: '',
			imageSource: '',
			csrf: document.head.querySelector('meta[name="csrf-token"]').content
		};
	},
	computed: {
		validTitle() {
			return this.title.length >= 6 && this.title.length <= 64;
		},
	},
	mounted() {
		if(typeof this.section != 'undefined') {
			this.editing = true;
			this.title = this.section.title;
		}
	},
	methods: {
		validateForm: (e) => {
			if(
				this.validTitle
			) {
				return true;
			}
			e.preventDefault();
		}
	}
}
</script>
