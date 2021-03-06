import { catchError, finalize, map, mergeMap, of, tap, throwError } from 'rxjs';
import axios, { AxiosRequestConfig, AxiosResponse, Method } from 'axios';
import { LoadingStateService } from '../services';

const defaultRequestConfig = {
    'Content-Type': 'application/json; charset=utf-8',
    'X-Requested-With': 'XMLHttpRequest',
};

const axiosInstance = axios.create({
    timeout: 6000,
    headers: defaultRequestConfig,
    withCredentials: true,
});

export function loadCSRFToken(token) {
    axiosInstance.defaults.headers.common['X-CSRF-TOKEN'] = token;
}

export const request = <T>(url: string, method: Method, config: AxiosRequestConfig = {}, touchAuth = false) => {
    return of({}).pipe(
        tap(() => LoadingStateService.setLoading(true)),
        mergeMap(() =>
            axiosInstance.request<T>(
                Object.assign({}, config, {
                    url,
                    method,
                })
            )
        ),
        map((resp) => resp.data),
        catchError((error) => {
            if (error.response.status === 401 && !touchAuth) {
                window.location.reload();
            }
            return throwError(() => error);
        }),
        finalize(() => LoadingStateService.setLoading(false))
    );
};

export const postFormData = <T>(
    url: string,
    data: FormData,
    config: AxiosRequestConfig = {
        headers: {
            'Content-Type': 'multipart/form-data',
        },
    }
) => {
    return of({}).pipe(
        tap(() => LoadingStateService.setLoading(true)),
        mergeMap(() => axios.post<FormData, AxiosResponse<T>>(url, data, config)),
        map((resp) => resp.data),
        catchError((error) => {
            return throwError(error);
        }),
        finalize(() => LoadingStateService.setLoading(false))
    );
};
