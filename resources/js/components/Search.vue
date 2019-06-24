<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Search results</strong>
                    </div>
                    <div class="card-body">
                        <div class="options">
                            <ul>
                                <li v-for="(detail, index) in clientDetailsNo" v-bind:key="index" @click="selectClientsNo(detail)" v-text="detail.contactNo">{{ detail.contactNo }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
export default {

}
</script>

