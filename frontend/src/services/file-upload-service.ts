import { postFormData } from '../utils';
import { FileUploadResponse } from '../models';
import { Observable } from 'rxjs';

class FileUploadService {
    postImage: (form: FormData) => Observable<FileUploadResponse> = (form) => {
        return postFormData<FileUploadResponse>(`/admin/upload/image`, form);
    }

    postVideo = (form) => {
        return postFormData<FileUploadResponse>(`/admin/upload/vedio`, form);
    }
}

export default new FileUploadService();