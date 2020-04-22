<template lang="pug">
    .options-container
        .option-content(v-if="checkType")
            .btn.btn-info(@click="add") Add other option
            .title-options Options            
            .option(v-for="(field, index) in fields")
                .form-inline.form-options
                    .form-group
                        label(for="'title-' + index") Title option
                        input.form-control(:id="'title-' + index", type='text', v-model="field.title")
                    .form-group
                        label(for="'value-' + index") Value question
                        input.form-control(:id="'title-' + index", type='text', v-model="field.value")
                    button.btn.btn-danger(v-if="index > 0", type='button', @click="deleteOption(field)") Delete option
        input(:name="nameField + '-field'", :type="nameField", v-model="formatJson", hidden)
</template>
<script>
export default {
    props: {
        nameField: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            fields: [
                { title: "", value: "" }
            ],
            typeField: ""
        }
    },
    computed: {
        formatJson() {
            let opts = document.getElementById("options");
            opts.value = JSON.stringify(this.fields)
            return opts.value
        },
        checkType() {
            let v = document.getElementById("value");
            switch(this.typeField) {
                case 'select':
                    v.value = ""
                    return true
                case 'checkbox':
                case 'radio':
                    v.value = "[]"
                    return true
                default:
                    v.value = ""
                    return false
            }
        }
    },
    methods: {        
        add() {
            let vm = this
            vm.fields.push({
                title: "", value: ""
            })
        },
        deleteOption(option) {
            let vm = this
            if (vm.fields.length > 1) {
              vm.fields.splice(vm.fields.indexOf(option), 1);
            }
        }
    },
    mounted() {
        let t = document.getElementById("type-select");
        let vm = this
        if (t.value != '') {
            let opts = document.getElementById("options");
            vm.typeField = t.value;
            vm.fields = JSON.parse(opts.value)
        }
        t.addEventListener("change", () => {
            vm.typeField = t.value;
        })
    }
}
</script>