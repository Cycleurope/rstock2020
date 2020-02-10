<template>
<div>
    <serial-checker @display-info="updateValues"/>
    <div>
        This serial is correct and available !
    </div>
</div>
</template>

<script>


export default {

    name: 'SerialForm',
    data() {
        return {
            serial: '',
            status: '',
        }
    },
    methods: {
        updateValues(e) {
            console.log(e);
        }
    }

}


</script>