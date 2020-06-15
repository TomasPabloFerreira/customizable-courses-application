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
					v-for="(section, sectionIndex) in course.sections"
					:key="section.id"
					no-body
					class="mb-1"
				>
					<b-card-header header-tag="header" class="p-1" role="tab">
						<b-button
							block
							v-b-toggle="'accordion-' + sectionIndex"
							variant="info"
						>
							{{ section.title }}
						</b-button>
					</b-card-header>
					<b-collapse
						:id="'accordion-' + sectionIndex"
						accordion="my-accordion"
						role="tabpanel"
					>
						<b-list-group flush>
							<!-- Lessons -->
							<template v-if="section.lessons.length">
								<b-list-group-item
									v-for="lesson in section.lessons"
									:key="lesson.id"
									:href="course.id + '/section/'
										+ section.id + '/lesson/'
										+ lesson.id"
								>
									{{ lesson.title }}
								</b-list-group-item>
							</template>
							<template v-else>
								<b-list-group-item>
									No lessons available
								</b-list-group-item>
							</template>
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
