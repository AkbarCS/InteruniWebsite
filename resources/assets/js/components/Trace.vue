<template>
    <gmap-map ref="map" :center="center" :zoom="9" :options="{streetViewControl: false}" style="width: 100%; padding-top: 75%;">
        <gmap-polyline ref="trace" :path="path"></gmap-polyline>
    </gmap-map>
</template>
<script>
    export default {
        data () {
            return {
                center: {lat: 0, lng: 0}
            }
        },
        props: {
            'path': {
                type: Array,
                required: true
            }
        },
        mounted () {
            let self = this;
            this.path.forEach(e => {
                self.center.lat += e.lat;
                self.center.lng += e.lng;
            });
            self.center.lat /= this.path.length;
            self.center.lng /= this.path.length;
        }
    }
</script>
