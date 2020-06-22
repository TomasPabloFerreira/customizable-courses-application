<template>
	<b-form @submit="validateForm" method="post" :action="route">
		<b-row cols="1" cols-md="2">
			<b-col class="mt-4">
				<label for="title">Title</label>
				<b-input
					v-model="title"
					:state="validTitle"
					id="title"
					name="title"
				>
				</b-input>
				<b-form-invalid-feedback :state="validTitle">
					Lesson title must be 6-64 characters long.
				</b-form-invalid-feedback>
				<b-form-valid-feedback :state="validTitle">
					Looks Good.
				</b-form-valid-feedback>
			</b-col>
			<b-col class="mt-4">
				<label for="videoSource">Video Source</label>
				<b-input
					v-model="videoSource"
					:state="validVideoSource"
					id="videoSource"
					name="videoSource"
				>
				</b-input>
				<b-form-invalid-feedback :state="validVideoSource">
					Video source must be 16-128 characters long.
				</b-form-invalid-feedback>
				<b-form-valid-feedback>
					Looks Good.
				</b-form-valid-feedback>
			</b-col>
			<b-col class="mt-4">
				<label for="duration">Video Duration</label>
				<b-form-timepicker
					v-model="duration"
					locale="de"
					show-seconds
					:state="validVideoDuration"
					id="duration"
					name="duration"
				>
				</b-form-timepicker>
			</b-col>
		</b-row>
		<b-row class="mt-4">
			<b-col class="text-right">
				<b-button
					variant="secondary"
					:href="'/course/' + course_id
						+ '/section/' + section_id
						+ '/lesson'"
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
	props: ['route', 'course_id', 'section_id', 'lesson'],
	data: () => {
		return {
			editing: false,
			title: '',
			videoSource: '',
			duration: null,
			csrf: document.head.querySelector('meta[name="csrf-token"]').content
		};
	},
	computed: {
		validTitle() {
			return this.title.length >= 6 && this.title.length <= 64;
		},
		validVideoSource() {
			return this.videoSource.length >= 16 && this.videoSource.length <= 128;
		},
		validVideoDuration(){
			return this.duration !== null;
		}
	},
	mounted() {
		if(typeof this.lesson != 'undefined') {
			this.editing = true;
			this.title = this.lesson.title;
			this.videoSource = this.lesson.video_source;
			this.duration = this.lesson.duration;
		}
	},
	methods: {
		validateForm: function (e) {
			if(
				this.validTitle
				&& this.validVideoSource
				&& this.validVideoDuration
			) {
				return true;
			}
			e.preventDefault();
		}
	}
}
</script>
