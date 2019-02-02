<template>
    <vue-recaptcha :sitekey="key" @verify="submit">
        <slot></slot>
    </vue-recaptcha>

</template>

<script>
    import VueRecaptcha from 'vue-recaptcha';

    export default {
        props: ['target'],
        components: {
            VueRecaptcha
        },
        computed: {
            key () {
                return document.head.querySelector('meta[name="recaptcha-key"]').content;
            }
        },
        methods: {
            submit () {
                $( this.target ).submit();
            }
        }
    }
</script>
