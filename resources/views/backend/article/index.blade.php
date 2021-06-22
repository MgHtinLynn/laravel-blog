@extends('backend.layouts.app')

@section('content')


    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h3><strong>Article List</strong></h3>
            <div v-if="!isBusy">
                <a href="{{ route('backend.article.create') }}" class="btn btn-md btn-primary px-4 py-2 rounded-pill">Add
                    New </a>
            </div>
        </div>

        <article-listing :url="`{{ route('backend.article.index') }}`" inline-template>
            <div>
                <spinner v-if="isBusy" class="mt-5"></spinner>
                <b-table :striped="false" show-empty busy.sync="isBusy" v-if="!isBusy" responsive
                         :items="items" :fields="fields" class="mt-4" tbody-class="cop-table"
                         thead-class="cop-table" v-cloak>

                    <template v-slot:cell(actions)="row">

                        <a
                            :href="`/backend/article/${row.item.id}/edit`"
                            class="btn btn-md btn-outline-primary px-4 py-2 rounded-pill">
                            <i class="fas fa-user-edit"></i> Edit
                        </a>

                        <b-btn size="sm"
                                class="px-4 py-2 rounded-pill"
                                variant="danger"
                                @click="$bvModal.show('delete' + row.item.id)">
                            <i class="fas fa-fw fa-ban"></i> Delete
                        </b-btn>

                        <b-modal lazy hide-footer :id="'delete' + row.item.id"
                                 title="Delete Article"
                        >

                            <template slot="default" slot-scope="{ cancel }">
                                <p>Are you sure you want to <span
                                        class="text-danger"><strong>Delete</strong></span> this article?
                                </p>
                                <hr>
                                <form :action="`/backend/article/${row.item.id}`" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <div class="text-right">
                                        <b-button variant="secondary" @click="cancel()">Cancel
                                        </b-button>
                                        <button class="btn btn-danger">Confirm</button>
                                    </div>
                                </form>
                            </template>
                        </b-modal>
                    </template>
                </b-table>


                <div class="row my-4">
                    <div class="col-6 d-flex">
                        <b-pagination
                            v-if="!isBusy"
                            align="left"
                            :total-rows="pagination.total"
                            prev-text="Previous"
                            next-text="Next"
                            :hide-ellipsis="true"
                            v-model="pagination.current_page"
                            @change="getResults"
                            :per-page="pagination.per_page"
                            v-show="pagination.total > selected"
                            limit="3"
                            class="mb-0 table-pagination-item"
                        ></b-pagination>

                        <b-form-select class="w-auto table-perPage-selector ml-2" @change="getResults()"
                                       v-model="selected"
                                       :options="options" v-if="!isBusy"
                                       v-show="pagination.total > selected"></b-form-select>
                    </div>
                    <div class="col-6">
                        <p class="mb-0 text-right" v-if="!isBusy ">
                            Showing <span v-text="pagination.from"></span> - <span v-text="pagination.to"></span> of
                            <span
                                v-text="pagination.total"></span> entries
                        </p>
                    </div>
                </div>
            </div>
        </article-listing>


    </div>
@endsection
