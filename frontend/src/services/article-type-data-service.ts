import { request } from '../utils';
import { ArticleTypeCreateRequest, ArticleTypeEditRequest, ArticleTypeListResponse } from '../models';

class ArticleTypeDataService {
    getList = (category: number) => {
        return request<ArticleTypeListResponse>('/admin/article/type/list', 'GET', {
            params: {
                category,
            },
        });
    };

    creat = (data: ArticleTypeCreateRequest) => {
        return request<void>('/admin/article/type/add', 'POST', {
            data,
        });
    };
    edit = (data: ArticleTypeEditRequest) => {
        return request<void>('/admin/article/type/edit', 'POST', {
            data,
        });
    };

    delete = (id: number) => {
        return request<void>('/admin/article/type/del', 'POST', {
            data: {
                id,
            },
        });
    };
}

export default new ArticleTypeDataService();