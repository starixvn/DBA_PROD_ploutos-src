import React, { Component } from 'react'
import PropTypes from 'prop-types'
import {
	Row, Col,
	Pagination, PaginationItem, PaginationLink,
} from 'reactstrap'

export default class Paginator extends Component {

	paginate = page => e =>  {
		e.preventDefault()
		this.props.paginate(page)
	}

	getCurrentPage(pager) {
		const currPageNum = pager.pages.find(pageNum)
		function pageNum(page) {
			return page.current === true
		}
		return currPageNum
	}
	
	render() {
		const pager = this.props.pager
		const currPageNum = this.getCurrentPage(pager)
		return  (
			<Row className={this.props.align ? (this.props.align === 'right' ? 'float-right' : 'float-left') : ''}>
				<Col xs="auto" className="p-0 my-1">
					{(pager.pages.length > 0) && (
						<div className="text--tiny text-muted py-2">
							Showing <b>{currPageNum.firstNum}</b> - <b>{currPageNum.secondNum}</b> of <strong>{this.props.count && (this.props.count).toLocaleString()}</strong> items
						</div>
					)}
				</Col>
				<Col xs="auto" className="my-1">
					{(pager.pages.length > 0) && (
						<Pagination className="m-0">
							<PaginationItem disabled={ pager.pages.length <= 1 || pager.paging.prev === false }>
								<PaginationLink onClick={this.paginate({ offset: 0, pn: 1 })} next href="#">&laquo;</PaginationLink>
							</PaginationItem>

							{ pager.paging.prev != false && (
								<PaginationItem>
									<PaginationLink onClick={this.paginate({ offset: pager.paging.prev, pn: currPageNum.pageNum-1 })} next href="#">&lsaquo;</PaginationLink>
								</PaginationItem>
							)}

							{ pager.pages.map((pg, i) => (
								<PaginationItem key={i} active={ pg.current } disabled={pager.pages.length == 1}>
									<PaginationLink onClick={this.paginate({ offset: pg.offset, pn: pg.pageNum })} href="#">{pg.pageNum}</PaginationLink>
								</PaginationItem>
							))}

							{ pager.paging.next != false && (
								<PaginationItem>
									<PaginationLink onClick={this.paginate({ offset: pager.paging.next, pn: currPageNum.pageNum+1 })} next href="#">&rsaquo;</PaginationLink>
								</PaginationItem>
							)}

							<PaginationItem disabled={ pager.pages.length <= 1 || pager.paging.next === false }>
								<PaginationLink onClick={this.paginate({ offset: pager.last.offset, pn: pager.last.index })} next href="#">&raquo;</PaginationLink>
							</PaginationItem>
						</Pagination>
					)}
				</Col>
			</Row>            
		)
	}
}

Paginator.propTypes = {
	paginate: PropTypes.func,
	align: PropTypes.string,
	count: PropTypes.number,
	pager: PropTypes.object
}