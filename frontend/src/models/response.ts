import { Article, ArticleType } from "./article";

interface ResponseBase<T> {
  errcode: number,
  errmessage: string,
  data: T,
}

interface ResponseList<T> {
  total?: number,
  list: T[],
}

interface ResponseInfo<T> {
  info: T,
}

export type ArticleTypeListResponse = ResponseBase<ResponseList<ArticleType>>;
export type ArticleListResponse = ResponseBase<ResponseList<Article>>;

export type ArticleDetailResponse = ResponseBase<ResponseInfo<Article>>;

export type ArticleCreateRequest =
  Omit<Article, "id" | "created_at" | "updated_at" | "read_cnt" | "status" | "covers">
  & { covers: string[] };
export type ArticleEditRequest =
  Omit<Article, "category" | "created_at" | "updated_at" | "read_cnt" | "status" | "covers">
  & { covers: string[] };

export type ArticleTypeCreateRequest = Omit<ArticleType, "id">;
export type ArticleTypeEditRequest = Pick<ArticleType, "id" | "name">;

export type FileUploadResponse = ResponseBase<{ url: string }>;
export type UserInfoResponse = ResponseBase<{ user: { id: number, email: string, group: number, create_at: string } }>

