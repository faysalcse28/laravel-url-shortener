new Vue({
			  el: '#app',
			  data: {

				  url: '',
				  id: '',
				  urlsData: [],
				  message: '',
				  isWarning: false,
				  isSuccess: false,

			  },
			  methods: {
				urlCreateForm() {
					this.isWarning = false;
					this.message = '';
					if(this.url == '' || this.url == undefined){
						this.isWarning = true;
						this.message = 'Please enter a valid URL.';
						return false;
					}
				  axios.post("/shorten", {
					url: this.url,
				  }).then(response => {
					if(response.data.status==400){
						this.isWarning = true;
						this.message = response.data.message;
					}else{
						this.isSuccess = true;
						this.getUrls();
						this.message = response.data.message;
					}
				  }).catch(error => {
					
				  })
				  this.url = '';
				},
				
				getUrls() {
				  axios.get("/get-urls", {
				  }).then(response => {
					if(response.data.status==400){
						this.isWarning = true;
						this.message = response.data.message;
					}else{
						this.urlsData = response.data.data;
					}
				  }).catch(error => {
					
				  })
				  this.url = '';
				},
				
				hideMessage(){
					this.isWarning = false;
					this.isSuccess = false;
					this.message = '';
				}

			},
			  created() {
				this.getUrls();
			  },
			})