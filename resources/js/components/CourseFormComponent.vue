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
			<b-col>
				<label for="imageSource">Image Source</label>
				<b-input
					v-model="imageSource"
					:state="validImageSource"
					id="imageSource"
					name="imageSource"
				>
				</b-input>
				<b-form-invalid-feedback :state="validImageSource">
					Image source must be 0-256
				</b-form-invalid-feedback>
				<b-form-valid-feedback>
					Looks Good.
				</b-form-valid-feedback>
			</b-col>
		</b-row>
		<b-row>
			<b-col class="mt-3">
				<label for="title">Description</label>
				<b-form-textarea
					v-model="description"
					:state="validDescription"
					placeholder="Tall textarea"
					rows="8"
					id="description"
					name="description"
				>
				</b-form-textarea>
				<b-form-invalid-feedback :state="validDescription">
					Course description must be 0-1024 characters long.
				</b-form-invalid-feedback>
				<b-form-valid-feedback :state="validDescription">
					Looks Good.
				</b-form-valid-feedback>
			</b-col>
		</b-row>

		<b-row class="mt-4">
			<b-col class="text-right">
				<b-button variant="secondary" href="/course" size="big">
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
	props: ['course'],
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
		validDescription() {
			return (
				this.description.length >=0 &&
				this.description.length <= 1024
			);
		},
		validImageSource() {
			return (
				this.imageSource.length >= 0 &&
				this.imageSource.length <= 256
			);
		}
	},
	beforeMount() {
	
	},
	mounted() {
		if(typeof this.course != 'undefined') {
			this.title = this.course.title;
			this.description = this.course.description;
			this.image_source = this.course.image_source;
		}
	},
	methods: {
		validateForm: (e) => {
			if(
				this.validTitle
				&& this.validDescription
				&& this.validImageSource
			) {
				return true;
			}
			e.preventDefault();
		}
	}
}
</script>
