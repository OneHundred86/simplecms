import { request } from "../utils";
import { UserInfoResponse } from "../models";

class UserService {
    getUserInfo = () => {
        return request<UserInfoResponse>(`/admin/self/user/info`, "GET", null, true);
    };
}

export default new UserService();
