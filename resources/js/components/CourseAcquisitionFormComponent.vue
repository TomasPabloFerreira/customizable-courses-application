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
					name="course_id"
				></b-form-select>
				<b-form-invalid-feedback :state="validCourse">
					Please select a course.
				</b-form-invalid-feedback>
				<b-form-valid-feedback :state="validCourse">
					Looks Good.
				</b-form-valid-feedback>
			</b-col>
			<template v-if="course_id">
				<b-col class="mt-4">
					<label for="users-table">Users:</label>
					<b-form-input
						v-model="criteria"
						placeholder="Search"
						class="mb-2"
					></b-form-input>
					<b-table
						ref="usersTable"
						selectable
						select-mode="multi"
						:items="filteredUsers"
						:fields="userFields"
						:filter="criteria"
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
					<input type="hidden" name="users" v-model="selectedUserIds">
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
					<b-button size="sm" @click="clearSelected">
						Clear selected
					</b-button>
				</b-col>
			</template>
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
	props: ['route', 'courses', 'users', 'courseacquisitions'],
	data: () => {
		return {
			course_id: null,
			selectedUsers: [],
			currentPage: 1,
			criteria: '',
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
			return this.selectedUsers.length > 0;
		},
		usersCount() {
			return this.filteredUsers.length;
		},
		selectedUserIds() {
			return this.selectedUsers.map(x => x.id);
		},
		usersWhoAdquiredTheCourse() {
			if(!this.course_id) return [];
			return this.courseacquisitions.reduce((acc, acquisition) => {
				return (acquisition.course_id == this.course_id)
					? acc.concat(acquisition.user_id)
					: acc;
			}, []);
		},
		filteredUsers() {
			if(!this.course_id) return [];
			return this.users.filter(user => {
				return !this.usersWhoAdquiredTheCourse.includes(user.id);
			});
		}
	},
	methods: {
		validateForm: function (e) {
			if(
				this.validCourse
				&& this.validUsers
			) {
				return true;
			}
			e.preventDefault();
		},
		onRowSelected(items) {
			this.selectedUsers = items;
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
