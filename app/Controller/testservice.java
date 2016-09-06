package com.tagcmd.api.production.sourcingjobs.integrationTest;

import org.junit.Before;
import org.junit.Test;
import org.springframework.beans.factory.annotation.Autowired;
import com.fasterxml.jackson.databind.ObjectMapper;
import com.tagcmd.api.admin.company.service.IBusinessEntityService;
import com.tagcmd.api.admin.company.service.ICompanyService;
import com.tagcmd.api.admin.company.service.impl.ComponentFormService;
import com.tagcmd.api.admin.security.domain.Login;
import com.tagcmd.api.admin.security.service.impl.SecurityService;
import com.tagcmd.api.base.BaseServiceIntegrationTest;
import com.tagcmd.api.common.country.domain.Country;
import com.tagcmd.api.common.country.service.impl.CountryService;
import com.tagcmd.api.common.search.dto.ResultsWrapper;
import com.tagcmd.api.core.domain.Pagination;
import com.tagcmd.api.dto.Identities;
import com.tagcmd.api.production.sourcingcategories.service.impl.SourcingCategoriesService;
import com.tagcmd.api.production.sourcingtemplates.service.impl.SourcingTemplatesService;
import com.tagcmd.dynamicform.service.impl.DynamicFormService;
import java.util.ArrayList;
import java.util.Arrays;

public class CountryServiceTest extends BaseServiceIntegrationTest {

	@Autowired
	private CountryService classUnderTest;
	@Autowired
	private ComponentFormService componentFormService;

	@Autowired
	private SecurityService securityService;

	@Autowired
	private DynamicFormService dynamicFormService;

	@Autowired
	private IBusinessEntityService businessEntityService;

	@Autowired
	private ICompanyService companyService;

	@Autowired
	private SourcingCategoriesService sourcingCategoriesService;
	@Autowired
	private CountryService countryService;

	@Autowired
	private SourcingTemplatesService sourcingTemplatesService;

	private static final ObjectMapper mapper = new ObjectMapper();

	private static final int COUNT = 10;
	private static final int MAX_COUNT = 55;
	private static final int MAX_SOURCING_JOB_DESCRIPTION_CHARS = 244;
	private static final int MAX_DELIVERY_LOCATION_CHARS = 2020;
	private static final long NANOTIME = System.nanoTime();
	private static final int SOURCING_JOB_SOME_FIELD_COUNT = 34;
	private static final int SOURCING_JOB_ALL_FIELD_COUNT = 48;

	@Before
	public void setUp() {
		createUserSession();
		SourcingJobServiceIntegrationData.setCountryService(countryService);

		SourcingJobServiceIntegrationData.setBusinessEntityService(businessEntityService);
		SourcingJobServiceIntegrationData.setSourcingCategoriesService(sourcingCategoriesService);
		SourcingJobServiceIntegrationData.setSourcingTemplatesService(sourcingTemplatesService);
	}

	// @Test
	// public void test_status_update() throws Exception{
	//
	// JobStatusDtlsRequest req = new JobStatusDtlsRequest();
	// req.setJobID();
	// }
	private void createUserSession() {

		Login login = new Login("admin11111", "Pa55word!");
		String authParam = "apikey=\"apikey1\" accessToken=\"${AUTHENTICATIONTOKEN}\"";
		String domain = "localhost:8080";

		try {
			securityService.authenticateIS(login, authParam, domain);
		} catch (Exception e) {
			e.printStackTrace();
		}
	}

	@Test
	public void test_when_searching_using_string_country_name_expect_no_failure() throws Exception {

		// @SETUP	
		String search = "South Africa";

		// @EXCERSISE
		ResultsWrapper<Country> result = classUnderTest.list(search, true, Pagination.DEFAULT_PAGINATION);

		assertTrue("List doesn't return any results", result.getResults().size() > 0);

	}

	@Test
	public void test_when_searching_using_country_ids_and_searname_set_to_null_expect_no_failure() throws Exception {

		// @SETUP	
		String search = null;
		Identities listOfCountriesToBeDisplayedFirst = new Identities(new ArrayList<Integer>(Arrays.asList(1, 2, 4, 5)));

		// @EXCERSISE
		ResultsWrapper<Country> result = classUnderTest.list(search, listOfCountriesToBeDisplayedFirst, false, Pagination.DEFAULT_PAGINATION);

		assertTrue("List doesn't return any results", result.getResults().size() > 0);

	}

	@Test
	public void test_when_searching_using_country_id_and_searname_set_to_a_name_starting_with_or_expect_no_failure() throws Exception {

		// @SETUP	
		String search = "or";
		Identities listOfCountriesToBeDisplayedFirst = new Identities(new ArrayList<Integer>(Arrays.asList(1)));

		// @EXCERSISE
		ResultsWrapper<Country> result = classUnderTest.list(search, listOfCountriesToBeDisplayedFirst, false, Pagination.DEFAULT_PAGINATION);

		assertTrue("List doesn't return any results", result.getResults().size() > 0);

	}

	@Test
	public void test_when_searching_using_country_id_is_set_to_2_country_ids_and_searname_set_to_a_name_starting_with_or_expect_no_failure() throws Exception {

		// @SETUP	
		String search = "or";
		Identities listOfCountriesToBeDisplayedFirst = new Identities(new ArrayList<Integer>(Arrays.asList(1, 2)));

		// @EXCERSISE
		ResultsWrapper<Country> result = classUnderTest.list(search, listOfCountriesToBeDisplayedFirst, false, Pagination.DEFAULT_PAGINATION);

		assertTrue("List doesn't return any results", result.getResults().size() > 0);

	}

	@Test
	public void test_when_searching_using_country_id_1_id_to_null_and_searname_set_to_a_name_starting_with_or_expect_no_failure() throws Exception {

		// @SETUP	
		String search = "or";
		Identities listOfCountriesToBeDisplayedFirst = null;

		// @EXCERSISE
		ResultsWrapper<Country> result = classUnderTest.list(search, listOfCountriesToBeDisplayedFirst, false, Pagination.DEFAULT_PAGINATION);

		assertTrue("List doesn't return any results", result.getResults().size() > 0);

	}

}
