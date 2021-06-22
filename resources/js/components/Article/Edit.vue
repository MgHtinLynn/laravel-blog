<template>
    <div>
        <b-form-group id="input-group-title" label="Title:" label-for="input-title">
            <b-form-input
                id="input-title"
                name="title"
                v-model="form.title"
                required
                placeholder="Enter Title"
                :class="invalidClass"
            ></b-form-input>
            <span class="invalid-feedback" role="alert" v-if="error_title_message">
                <strong>{{ error_title_message }}</strong>
            </span>
        </b-form-group>

        <b-form-group id="input-cover-photo" label="Cover Photo:" label-for="input-cover-photo">
            <div class="hide-file">
                <input type="file" accept="image/*" ref="fileInput" name="coverPhoto" @input="pickFile">
            </div>
            <img class="preview" width="200" height="200" :src="previewImage" @click="selectImage"/>
            <input type="hidden" v-model="form.cover_photo">
        </b-form-group>


        <b-form-group
            id="input-group-description"
            label="Description"
            label-for="input-description"
        >
            <ckeditor :editor="editor" v-model="form.description" :config="editorConfig"></ckeditor>
        </b-form-group>

        <b-button @click="updateArticle()" class="btn btn-md px-4 py-2 rounded-pill" variant="primary">Update</b-button>

    </div>
</template>
<script>

import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import UploadAdapter from '../../plugins/UploadAdapter';

export default {
    name: "Edit",
    props: ['url', 'articleData', 'mainUrl', 'uploadUrl'],
    data() {
        return {
            editor: ClassicEditor,
            form: {
                title: this.articleData.title,
                description: this.articleData.description,
                cover_photo: this.articleData.cover_photo
            },
            editorConfig: {
                extraPlugins: [this.uploader]
            },
            error_title_message: null,
            previewImage: this.articleData.cover_photo
        }
    },
    computed: {
        invalidClass() {
            if (this.error_title_message) {
                return 'is-invalid'
            }
            return ''
        }
    },
    methods: {
        uploader(editor) {
            editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                return new UploadAdapter(loader);
            };
        },
        updateArticle() {
            axios.put(this.url, this.form)
                .then(response => {
                    if (response.status === 200) {
                        window.location.href = this.mainUrl
                    }
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        this.error_title_message = error.response.data.errors.title[0]
                    }
                });
        },
        selectImage() {
            this.$refs.fileInput.click()
        },
        pickFile() {
            let input = this.$refs.fileInput
            let file = input.files
            if (file && file[0]) {
                this.uploadCoverProfile(file[0])
                let reader = new FileReader
                reader.onload = e => {
                    this.previewImage = e.target.result
                }
                reader.readAsDataURL(file[0])
                this.$emit('input', file[0])
            }
        },
        uploadCoverProfile(file) {

            let data = new FormData();
            data.append('coverPhoto', 'coverPhoto');
            data.append('upload', file);

            axios.post(
                this.uploadUrl,
                data,
                {headers: {'Content-Type': 'multipart/form-data'}}
            ).then(
                response => {
                    if (response.status === 200) {
                        this.form.cover_photo = response.data.url
                    }
                }
            )
        }
    }
}
</script>

<style scoped>
.ck-editor__editable {
    min-height: 500px;
}

.ck-content {
    height: 500px;
}

.preview {
    cursor: pointer;
}

.hide-file {
    display: none;
}
</style>
