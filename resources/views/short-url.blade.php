<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<title>Laravel 8 URL Shortener</title>
    </head>
    <body>
        <div class="container my-5" id="app">
            <div class="row">
                <h1 class="my-2 fs-4 fw-bold text-center">Laravel URL Shortener</h1>
                <form method="POST" @submit.prevent="urlCreateForm" class="my-2">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" v-model="url" class="form-control" placeholder="URL Shortener">
                        <button class="btn btn-outline-secondary" type="submit">Shorten</button>
                    </div>
                </form>
                <div v-if="isSuccess" class="alert alert-success alert-dismissible fade show" role="alert">
					<span v-text="message" ></span>
                    <button type="button" class="btn-close" v-on:click="hideMessage()" aria-label="Close"></button>
                </div>

                <div v-if="isWarning" class="alert alert-warning alert-dismissible fade show" role="alert">
					<span v-text="message" ></span>
                    <button type="button" class="btn-close" v-on:click="hideMessage()" aria-label="Close"></button>
                </div>

                <table v-if="urlsData.length>0" class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">URL Key</th>
                            <th scope="col">URL Destination</th>
                            <th scope="col">Short URL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in urlsData" :key="`$index`">
                            <th v-text="($index+1)"></th>
                            <td v-text="item.url_key"></td>
                            <td v-text="item.destination_url"></td>
                            <td v-text="item.default_short_url"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js" charset="utf-8"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.2/vue-resource.min.js" charset="utf-8"></script>
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
		<script type="text/javascript" src="{{ asset('js/vue.js') }}"></script>
		<script>	
			
		</script>
    </body>
</html>