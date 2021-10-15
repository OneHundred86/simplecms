import { request } from '../utils';

class LoginService {
    signIn = ({ email, password, code }) => {
        return request<void>('/admin/login', 'POST', {
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
    getVerificationCode = () => {
        return request<void>('/verify/code', 'GET');
    }
}

export default new LoginService();