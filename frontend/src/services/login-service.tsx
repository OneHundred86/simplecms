import { request } from '../utils';
import { LoginResponse } from '../models';
import MD5 from 'crypto-js/md5';

class LoginService {
    signIn = ({ email, password, code }) => {
        const encryptPwd = MD5(password).toString();
        console.log('earo say the pwd', password, encryptPwd);

        return request<LoginResponse>(`/admin/login`, 'POST', {
            data: {
                email,
                password: encryptPwd,
                code,
            },
        });
    };
    signOut = () => {
        return request<void>(`/admin/sign`, 'GET');
    };
}

export default new LoginService();
