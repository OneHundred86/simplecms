
export interface Article{
    id: number,
    category: number,
    title: string,
    summary: string,
    content: string,
    status: number,
    type_id: number | null,
    read_cnt: number,
    created_at: string,
    updated_at: string,
    covers?: ArticleCover[],
    type?: ArticleType[],
}

export interface ArticleType {
    id: number,
    category: number,
    name: string,
    parent_id?: number,
}

export interface ArticleCover {
    id: number,
    article_id: number,
    img: string,
}