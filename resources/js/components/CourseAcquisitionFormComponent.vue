<template>
	<b-form @submit="validateForm" method="post" :action="route">
		<!-- Course selector -->
		<b-row cols="1">
			<b-col>
				<label for="course-selector">Course</label>
				<b-form-select
					v-model="course_id"
					:options="courses"
					:state="validCourse"
					id="course-selector"
				></b-form-select>
				<b-form-invalid-feedback :state="validCourse">
					Please select a course.
				</b-form-invalid-feedback>
				<b-form-valid-feedback :state="validCourse">
					Looks Good.
				</b-form-valid-feedback>
			</b-col>
			<b-col class="mt-4">
				<label for="users-table">Users:</label>
				<b-table
					ref="usersTable"
					selectable
					select-mode="multi"
					:items="users"
					:fields="userFields"
					@row-selected="onRowSelected"
					responsive="sm"
					per-page="10"
					:current-page="currentPage"
					id="users-table"
				>
					<template v-slot:cell(selected)="{ rowSelected }">
						<template v-if="rowSelected">
							<span aria-hidden="true">&check;</span>
							<span class="sr-only">Selected</span>
						</template>
						<template v-else>
							<span aria-hidden="true">&nbsp;</span>
							<span class="sr-only">Not selected</span>
						</template>
					</template>
				</b-table>
			</b-col>
			<b-col>
				<input type="hidden" />
				<b-form-invalid-feedback :state="validUsers">
					Please select at least one user.
				</b-form-invalid-feedback>
				<b-form-valid-feedback :state="validUsers">
					Looks Good.
				</b-form-valid-feedback>
			</b-col>
			<b-col>
				<!-- Paginator -->
				<b-pagination
					class="justify-content-center"
					v-model="currentPage"
					:total-rows="usersCount"
					per-page="10"
					aria-controls="users-table"
				></b-pagination>
			</b-col>
			<b-col>
				<b-button size="sm" @click="selectAllRows">Select all</b-button>
				<b-button size="sm" @click="clearSelected">Clear selected</b-button>
			</b-col>
		</b-row>

		<b-row class="mt-4">
			<b-col class="text-right">
				<b-button variant="secondary" href="/course-acquisition" size="big">
					Cancel
				</b-button>
				<b-button variant="primary" size="big" type="submit">
					Confirm
				</b-button>
			</b-col>
		</b-row>
		<input type="hidden" name="_token" :value="csrf">
	</b-form>
</template>


<script>
export default {
	props: ['route', 'courses', 'users'],
	data: () => {
		return {
			course_id: null,
			userIds: [],
			currentPage: 1,
			userFields: [
				{
					key: 'selected',
					label: 'selected',
					sortable: false
				},
				{
					key: "name",
					label: "Name",
					sortable: true,
				},
				{
					key: "surname",
					label: "Surname",
					sortable: true,
				},
			],
			csrf: document.head.querySelector('meta[name="csrf-token"]').content
		};
	},
	computed: {
		validCourse() {
			return this.course_id != null;
		},
		validUsers() {
			return this.userIds.length > 0;
		},
		usersCount() {
			return this.users.length;
		}
	},
	methods: {
		validateForm: (e) => {
			if(
				this.validCourse
				&& this.validUser
			) {
				return true;
			}
			e.preventDefault();
		},
		onRowSelected(items) {
			this.userIds = items;
		},
      selectAllRows() {
        this.$refs.usersTable.selectAllRows();
      },
      clearSelected() {
        this.$refs.usersTable.clearSelected();
      },
	}
}
</script>
