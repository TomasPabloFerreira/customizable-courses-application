<template>
	<b-container fluid class="mt-4">
		<b-row>
			<b-col cols="12" md="8">
				<b-embed
					type="iframe"
					aspect="16by9"
					:src="lesson.video_source"
					allowfullscreen
				>
				</b-embed>
				<div class="course-title-container">
					<span>{{ lesson.title }}</span>
				</div>
			</b-col>
			<b-col cols="12" md="4">
				<lesson-list :course="course" samepath></lesson-list>
			</b-col>
		</b-row>
	</b-container>
</template>

<script>
export default {
props: ['course', 'sectionid', 'lessonid'],
data() {
		return {
			section: {},
			lesson: {}
		};
	},
	beforeMount() {
		this.section = this.course.sections.find(section => {
			return section.id === this.sectionid
		});
		this.lesson = this.section.lessons.find(lesson => {
			return lesson.id === this.lessonid;
		}) 
	}
}
</script>
