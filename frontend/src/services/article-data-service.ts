import { request } from '../utils';
import {
    ArticleCreateRequest,
    ArticleDetailResponse,
    ArticleEditRequest, ArticleFilter,
    ArticleListResponse,
} from '../models';
import { catchError, of } from 'rxjs';

class ArticleDataService {
    getList = (params: ArticleFilter) => {
        return request<ArticleListResponse>('/admin/article/list', 'GET', {
            params
        }).pipe(
            catchError(err =>{
                return of({
                    errcode: 0,
                    errmessage: '',
                    data: {
                        total: 100,
                        list: [
                            {
                                id: 1,
                                category: 0,
                                title: 'Title',
                                summary: '',
                                content: '',
                                type_id: 1,
                                status: 0,
                                read_cnt: 400,
                                created_at: '',
                                updated_at: '',
                            },
                            {
                                id: 2,
                                category: 0,
                                title: 'Title',
                                summary: '',
                                content: '',
                                type_id: 1,
                                status: 1,
                                read_cnt: 400,
                                created_at: '',
                                updated_at: '',
                            }
                        ]
                    }
                })
            })
        );
    };

    getDetail = (id: number) => {
        return request<ArticleDetailResponse>('/admin/article/info', 'GET', {
            params: {
                id,
            },
        });
    };

    creat = (data: ArticleCreateRequest) => {
        return request<void>('/admin/article/add', 'POST', {
            data,
        });
    };
    edit = (data: ArticleEditRequest) => {
        return request<void>('/admin/article/edit', 'POST', {
            data,
        });
    };

    delete = (id: number) => {
        return request<void>('/admin/article/del', 'POST', {
            data: {
                id,
            },
        });
    };

    publish = (id: number) => {
        return request<void>('/admin/article/publish', 'POST', {
            params: {
                id,
            },
        });
    };
    withdraw = (id: number) => {
        return request<void>('/admin/article/withdraw', 'POST', {
            params: {
                id,
            },
        });
    };
}

export default new ArticleDataService();