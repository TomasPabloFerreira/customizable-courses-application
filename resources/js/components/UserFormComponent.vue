<template>
	<div>
		<b-form  @submit="validateForm" method="post" :action="url">
			<b-row cols="1" cols-sm="2" cols-lg="3">
				<b-col class="mt-3">
					<label for="name">Name</label>
					<b-input
						v-model="name"
						:state="validName"
						id="name"
						name="name"
						>
					</b-input>
					<b-form-invalid-feedback :state="validName">
						User name must be 3-32 characters long.
					</b-form-invalid-feedback>
					<b-form-valid-feedback :state="validName">
						Looks Good.
					</b-form-valid-feedback>
				</b-col>
				<b-col class="mt-3">
					<label for="surname">Surname</label>
					<b-input
						v-model="surname"
						:state="validSurname"
						id="surname"
						name="surname"
						>
					</b-input>
					<b-form-invalid-feedback :state="validSurname">
						User surname must be 3-32 characters long.
					</b-form-invalid-feedback>
					<b-form-valid-feedback :state="validSurname">
						Looks Good.
					</b-form-valid-feedback>
				</b-col>
				<b-col class="mt-3">
					<label for="email">Email</label>
					<b-input
						v-model="email"
						:state="validEmail"
						id="email"
						name="email"
						type="email"
						>
					</b-input>
					<b-form-invalid-feedback :state="validEmail">
						Enter a valid email address.
					</b-form-invalid-feedback>
					<b-form-valid-feedback :state="validEmail">
						Looks Good.
					</b-form-valid-feedback>
				</b-col>
				<b-col class="mt-3">
					<label for="roleSelector">Role</label>
					<b-form-select
						:options="roles"
						v-model="selectedRole"
						:state="roleIsSelected"
						id="role"
						name="role"
					>
					</b-form-select>
					<b-form-invalid-feedback :state="roleIsSelected">
						Select a role.
					</b-form-invalid-feedback>
					<b-form-valid-feedback :state="roleIsSelected">
						Looks Good.
					</b-form-valid-feedback>

				</b-col>
				<b-col class="mt-3">
					<label for="password">Password</label>
					<b-input
						v-model="password"
						:state="validPassword"
						id="password"
						name="password"
						type="password"
						>
					</b-input>
					<b-form-invalid-feedback :state="validPassword">
						User password must be 8-64 characters long.
					</b-form-invalid-feedback>
					<b-form-valid-feedback :state="validPassword">
						Looks Good.
					</b-form-valid-feedback>
				</b-col>
				<b-col class="mt-3">
					<label for="passwordConfirmation">
						Confirm Password
					</label>
					<b-input
						v-model="passwordConfirmation"
						:state="passwordsMatch"
						id="passwordConfirmation"
						type="password"
						>
					</b-input>
					<b-form-invalid-feedback :state="passwordsMatch">
						Passwords do not match.
					</b-form-invalid-feedback>
					<b-form-valid-feedback :state="passwordsMatch">
						Looks Good.
					</b-form-valid-feedback>
				</b-col>
			</b-row>
			<b-row class="mt-4">
				<b-col class="text-right">
					<b-button variant="secondary" href="/user" size="big">
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
	</div>
</template>

<script>
export default {
    props: ['roles', 'user'],
	data: () => {
		return {
			editing: false,
			url: '../user/',
			name: '',
			surname: '',
			email: '',
			password: '',
			passwordConfirmation: '',
			selectedRole: null,
			csrf: document.head.querySelector('meta[name="csrf-token"]').content
		}
	},
	computed: {
		validName() {
			return this.name.length >= 3 && this.name.length <= 32; 
		},
		validSurname() {
			return this.surname.length >= 3 && this.surname.length <= 32; 
		},
		validEmail() {
			const regularExp = /\S+@\S+\.\S+/;
			return regularExp.test(this.email) && this.email.length <= 320;
		},
		validPassword() {
			return this.password.length >= 8 && this.password.length <= 64; 
		},
		passwordsMatch() {
			return this.password === this.passwordConfirmation;
		},
		roleIsSelected() {
			return this.selectedRole !== null;
		}
	},
	beforeMount () {
		this.roles.unshift({ value: null, text: 'Select an option'});
	},
	mounted () {
		if(typeof this.user != 'undefined') {
			this.editing = true;
			this.url += this.user.id;
			this.name = this.user.name;
			this.surname = this.user.surname;
			this.email = this.user.email;
		}
	},
	methods: {
		validateForm: function (e) {
			if(
				this.validName
				&& this.validSurname
				&& this.validEmail
				&& this.validPassword
				&& this.passwordsMatch
				&& this.roleIsSelected
			) {
				return true;
			}
			e.preventDefault();
		}
	}
};
</script>
