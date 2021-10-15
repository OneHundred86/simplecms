import { request } from '../utils';
import { LoginResponse } from "../models";

class LoginService {
    signIn = ({ email, password, code }) => {

        return request<LoginResponse>('/admin/login', 'POST', {
            data: {
                email,
                password,
                code,
            },
        });
    };
    signOut = () => {
        return request<void>('/admin/sign', 'GET');
    };
}

export default new LoginService();
