import { request } from '../utils';
import {
    ArticleCreateRequest,
    ArticleDetailResponse,
    ArticleEditRequest,
    ArticleFilter,
    ArticleListResponse,
    VoidResponse,
} from '../models';

class ArticleDataService {
    getList = (params: ArticleFilter) => {
        return request<ArticleListResponse>(`/admin/article/list`, 'GET', {
            params,
        });
    };

    getDetail = (id: number) => {
        return request<ArticleDetailResponse>(`/admin/article/info`, 'GET', {
            params: {
                id,
            },
        });
    };

    create = (data: ArticleCreateRequest) => {

        return request<VoidResponse>(`/admin/article/add`, 'POST', {
            data,
        });
    };
    edit = (data: ArticleEditRequest) => {
        return request<VoidResponse>(`/admin/article/edit`, 'POST', {
            data,
        });
    };

    delete = (id: number) => {
        return request<void>(`/admin/article/del`, 'POST', {
            data: {
                id,
            },
        });
    };

    publish = (id: number) => {
        return request<void>(`/admin/article/publish`, 'POST', {
            params: {
                id,
            },
        });
    };
    withdraw = (id: number) => {
        return request<void>(`/admin/article/withdraw`, 'POST', {
            params: {
                id,
            },
        });
    };
}

export default new ArticleDataService();