<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Eample Component</div>
                    x
                    <div class="card-body">
                        I'm an example component.
                    </div>
                    <input type="text" v-model="myName">
                    <p v-text="myName" >my name is  </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "example-component",
        data() {
            return {
            myName:"Daggie Daggie"
        }
        }
    }
</script>
