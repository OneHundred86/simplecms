import { lastValueFrom, Subscription } from 'rxjs';
import { FileUploadService } from '../../services';

export const uploadVideo = (file) => {
    const formData = new FormData();

    formData.append('file', file);
    return lastValueFrom(FileUploadService.postVideo(formData)).then((resp) => {
        if (resp.errcode !== 0) {
            return { default: 'https://33333.cdn.cke-cs.com/rc1DFuFpHqcR3Mah6y0e/images/a941c59ff780060b51d398434c99fe9f229615b4227f5434.png' };
        }
        return { default: resp.data.url };
    }).catch(() => {
        return { default: 'https://33333.cdn.cke-cs.com/rc1DFuFpHqcR3Mah6y0e/images/a941c59ff780060b51d398434c99fe9f229615b4227f5434.png' };
    });
};

class VideoUploadAdapter {
    private loader: any;
    private _uploadTask: Subscription;

    constructor(loader) {
        this.loader = loader;
    }

    upload() {
        return this.loader.file.then(uploadVideo);
    }

    abort() {
        return Promise.reject();
    }
}

export function VideoUploadAdapterPlugin(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
        return new VideoUploadAdapter(loader);
    };
}