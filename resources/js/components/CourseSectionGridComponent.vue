<template>
    <b-container fluid>
        <b-row>
            <b-col>
                <b-form-select
                    v-model="perPage"
                    id="perPageSelect"
                    size="sm"
                    :options="pageOptions"
                ></b-form-select>
            </b-col>
            <b-col>
            </b-col>
            <b-col>
                <!-- Search input -->
                <b-form-input
                    v-model="criteria"
                    placeholder="Search"
                ></b-form-input>
            </b-col>
        </b-row>
        <b-row class="mt-3">
            <b-col overflow-auto>
                <!-- Table -->
                <b-table
                    id="course-sections-table"
                    :current-page="currentPage"
                    striped
                    hover
                    :items="sections"
                    :fields="fields"
                    :filter="criteria"
                    :perPage="perPage"
                    responsive
                >
					<template v-slot:cell(actions)="row" >
						<div style="display: inline-flex;">
							<b-button
								size="sm"
								class="mr-1"
								variant="primary"
								:href="'section/' + row.item.id + '/lesson'"
							>
								<b-icon-collection-play
									width="1em"
									height="1.4em"
								></b-icon-collection-play>
								<span>View lessons</span>
							</b-button>
							<b-button
								size="sm"
								class="mr-1"
								variant="success"
								:href="'section/' + row.item.id + '/edit'"
							>
								<b-icon-pencil-square
									width="1em"
									height="1.4em"
								></b-icon-pencil-square>
							</b-button>

							<form
								:action="'section/' + row.item.id"
								method="post"
								@submit="confirmDelete"
							>
								<input type="hidden" name="_method" value="DELETE">
								<input type="hidden" name="_token" :value="csrf">
								<b-button
									size="sm"
									variant="danger"
									type="submit"
								>
									<b-icon-person-dash-fill
										width="1em"
										height="1.4em"
									></b-icon-person-dash-fill>
								</b-button>
							</form>
						</div>
					</template>
                </b-table>

                <b-row>
					<b-col>
						<!-- Paginator -->
						<b-pagination
							v-model="currentPage"
                           	:total-rows="rows"
                            :per-page="perPage"
                            aria-controls="course-sections-table"
                        ></b-pagination>
                    </b-col>
		    
					<b-col class="text-center">
						<b-button 
							size="lg"
							variant="secondary"
							class="mt-1"
							href="/course"	
						>
							<b-icon-arrow-return-left
							></b-icon-arrow-return-left>
							Courses
						</b-button>
						<b-button 
							size="lg"
							variant="primary"
							class="mt-1"
							href="section/create"	
						>
							Create Section
						</b-button>
					</b-col>

                    <b-col class="text-right">
                        <p class="mt-3">
							Current Page: {{ currentPage }} of {{ rows }}
                		</p>
                    </b-col>
                </b-row>
            </b-col>
        </b-row>
    </b-container>

</template>

<script>
export default {
    props: ["sections"],
    data() {
        return {
			csrf: document.head.querySelector('meta[name="csrf-token"]').content,
            pageOptions: [5, 10, 25, 50, 100],
            currentPage: 1,
            perPage: 10,
            criteria: "",
            fields: [
                {
                    key: "title",
                    label: "Title",
                    sortable: true,
                },
                { key: "actions", label: "Actions", sortable: false }
            ]
        };
    },
	methods: {
		confirmDelete: (e) => {
			let confirmation = confirm(
				'Are you sure you want to delete this course section?'
			);
			if(confirmation) return true;
			e.preventDefault();
		}
	},
	computed: {
		rows() {
			return this.sections.length;
		}
	}
}
</script>
