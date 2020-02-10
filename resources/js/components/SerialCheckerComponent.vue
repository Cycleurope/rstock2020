<template>
    <div class="form-group">
        <input type="number" :model="serial" class="form-control flatcontrol col-4" placeholder="Numéro de série" maxlength="8" @input="handleValueChange">
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                serial: '',
                status: '',
            };
        },
        methods: {

            handleValueChange: function(e) {
                this.serial = e.target.value
                console.log(this.serial)
                axios
                    .get('http://fleetmanager.mac/api/serials/search/'+this.serial)
                    .then(response => {
                        if(response.data.serial != null) {
                            this.serial = response.data.serial
                            this.status = response.data.status
                            this.displayInfo(this.serial, this.status);
                        }
                    });
            },

            displayInfo(serial, status) {
                this.$emit('display-info', serial, status)
            }
        }
    }
</script>
