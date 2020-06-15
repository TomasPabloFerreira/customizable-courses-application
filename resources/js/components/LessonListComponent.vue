<template>
	<b-card
		no-body
		header="Course Sections"
		border-variant="info"
		align="center"
		header-text-variant="bold"
	>
		<b-card-body>
			<div role="tablist">
				<!-- Sections -->
				<b-card
					v-for="(section, index) in course.sections"
					:key="section.id"
					no-body
					class="mb-1"
				>
					<b-card-header header-tag="header" class="p-1" role="tab">
						<b-button
							block
							v-b-toggle="'accordion-' + index"
							variant="info"
						>
							{{ section.title }}
						</b-button>
					</b-card-header>
					<b-collapse
						:id="'accordion-' + index"
						accordion="my-accordion"
						role="tabpanel"
					>
						<b-list-group flush>
							<!-- Lessons -->
							<b-list-group-item href="#">
								Lesson
							</b-list-group-item>
						</b-list-group>
					</b-collapse>
				</b-card>
			</div>
		</b-card-body>
	</b-card>
</template>

<script>
export default {
	props: ["course"]
};
</script>
