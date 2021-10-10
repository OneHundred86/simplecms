
export interface FilterModel {
    kw: string,
    offset: number,
    limit: number,
}

export type ArticleFilter = FilterModel & { type_id?: number, category: number }