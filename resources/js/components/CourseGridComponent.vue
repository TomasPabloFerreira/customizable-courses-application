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
                    id="courses-table"
                    :current-page="currentPage"
                    striped
                    hover
                    :items="courses"
                    :fields="fields"
                    :filter="criteria"
                    :perPage="perPage"
                    responsive
                >
					<template v-slot:cell(actions)="row">
						<b-button
							size="sm"
							variant="success"
							:href="'course/' + row.item.id + '/edit'"
						>
							<b-icon-pencil-square
								width="1em"
								height="1.4em"
							></b-icon-pencil-square>
						</b-button>

						<form
							:action="'course/' + row.item.id"
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
					</template>
                </b-table>

                <b-row>
					<b-col>
						<!-- Paginator -->
						<b-pagination
							v-model="currentPage"
                           	:total-rows="rows"
                            :per-page="perPage"
                            aria-controls="courses-table"
                        ></b-pagination>
                    </b-col>
		    
					<b-col class="text-center">
						<b-button 
							size="lg"
							variant="primary"
							class="mt-1"
							href="course/create"	
						>
							Create Course
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
    props: ["courses"],
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
                {
                    key: "description",
                    label: "Description",
                    sortable: true,
                },
                {
                    key: "image_source",
                    label: "Image Source",
                    sortable: true,
                },
                { key: "actions", label: "Actions", sortable: false }
            ]
        };
    },
	methods: {
		confirmDelete: (e) => {
			let confirmation = confirm(
				'Are you sure you want to delete this course?'
			);
			if(confirmation) return true;
			e.preventDefault();
		}
	},
	computed: {
		rows() {
			return this.courses.length;
		}
	}
}
</script>
