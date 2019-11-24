<template>
    <div class="container">
        <div class="modal fade" id="orangeModalSubscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-notify modal-warning" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header text-center">
                        <h4 class="modal-title white-text w-100 font-weight-bold py-2">House Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>
                    <form>
                    <!--Body-->
                    <div class="modal-body">

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="form3">Width(metres)</label>
                            <input type="number" id="form3" class="form-control validate" v-model="widtht" required>

                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="form2">Length(metres)</label>
                            <input type="number" id="form2" class="form-control validate" v-model="lengtht" required>

                        </div>
                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="form2">Number of rooms</label>
                            <input type="number" id="form2" class="form-control validate" v-model="noOfRooms" required>

                        </div>

                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                        <a type="submit" class="btn btn-outline-warning " data-dismiss="modal">Process <i class="fa fa-paper-plane-o ml-1"></i></a>
                    </div>
                    </form>
                </div>
                <!--/.Content-->
            </div>
        </div>
    <a class="btn btn-primary"  data-toggle="modal" data-target="#orangeModalSubscription">
        Recommended Quantity  &nbsp;
        <strong>{{ quantity}}</strong> Pieces

    </a>
    </div>
</template>


<script>
    export default {
        name: "example-component",
        data() {
            return {
            widtht:0,
                lengtht:0,
                noOfRooms:0

        }
        },
        computed: {
            // a computed getter
            quantity: function () {
                // `this` points to the vm instance
                return (this.widtht *this.lengtht)*this.noOfRooms
            }
        }
    }
</script>
