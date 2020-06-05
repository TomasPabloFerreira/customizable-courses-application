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
                    id="users-table"
                    :current-page="currentPage"
                    striped
                    hover
                    :items="users"
                    :fields="fields"
                    :filter="criteria"
                    :perPage="perPage"
                    responsive
                >
                    <!-- actions -->
                    <template v-slot:cell(actions)="row">
                        <b-button
                            size="sm"
                            variant="success"
                            :href="'user/' + row.item.id + '/edit'"
                        >
                            <b-icon-pencil-square
                                width="1em"
                                height="1.4em"
                            ></b-icon-pencil-square>
                        </b-button>
                        <b-button
                            size="sm"
                            variant="danger"
							@click="deleteUser(row.item.id)"
                        >
                            <b-icon-person-dash-fill
                                width="1em"
                                height="1.4em"
                            ></b-icon-person-dash-fill>
                        </b-button>
                    </template>
                </b-table>

                <b-row>
					<b-col>
						<!-- Paginator -->
						<b-pagination
							v-model="currentPage"
                           	:total-rows="rows"
                            :per-page="perPage"
                            aria-controls="users-table"
                        ></b-pagination>
                    </b-col>
		    
					<b-col class="text-center">
						<b-button 
							size="lg"
							variant="primary"
							class="mt-1"
							href="user/create"		
						>
							Create User
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
    props: ["users"],
    data() {
        return {
            pageOptions: [5, 10, 25, 50, 100],
            currentPage: 1,
            perPage: 10,
            criteria: "",
            fields: [
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
                {
                    key: "role.name",
                    label: "Role",
                    sortable: true,
                },
                {
                    key: "email",
                    label: "Email",
                    sortable: true,
                },
                {
                    key: "created_at",
                    label: "Creation Date",
                    sortable: true,
                },
                {
                    key: "updated_at",
                    label: "Last Update Date",
                    sortable: true,
                },
                { key: "actions", label: "Actions", sortable: false }
            ]
        };
    },
    methods: {
	deleteUser: (userId) => {
		let confirmation = confirm('are you sure you want to delete this user?');
		if(confirmation) {
			window.location.replace('user/' + userId + '/delete');
		}
	}
    },
    computed: {
        rows() {
            return this.users.length;
        }
    }
};
</script>
