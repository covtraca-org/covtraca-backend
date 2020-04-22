<template lang="pug">
    .options-container
        .btn.btn-info(@click="add") Add option
        .option-content
            .title-options Options            
            .option(v-for="(field, index) in fields")
                .form-inline.form-options
                    .form-group
                        label(for="'title-' + index") Title option
                        input.form-control(:id="'title-' + index", type='text', v-model="field.title")
                    .form-group
                        label(for="'value-' + index") Value question
                        input.form-control(:id="'title-' + index", type='text', v-model="field.value")
                    button.btn.btn-danger(type='button') Delete option
        input(:type="nameField", v-model="fields", hidden)
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
    methods: {
        add() {
            let vm = this
            vm.fields.push({
                title: "", value: ""
            })
        }
    },
    mounted() {
        let t = document.getElementById("type-select");
        let vm = this
        t.addEventListener("change", () => {
            vm.typeField = t.value;
        })
    }
}
</script>