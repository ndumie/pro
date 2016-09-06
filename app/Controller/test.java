package com.tagcmd.api.production.sourcingjobs.integrationTest;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Date;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;

import com.tagcmd.api.admin.category.domain.Category;
import com.tagcmd.api.admin.company.constants.RelationshipType;
import com.tagcmd.api.admin.company.domain.BusinessEntity;
import com.tagcmd.api.admin.company.service.IBusinessEntityService;
import com.tagcmd.api.common.country.service.ICountryService;
import com.tagcmd.api.common.search.dto.ResultsWrapper;
import com.tagcmd.api.core.domain.Pagination;
import com.tagcmd.api.core.domain.User;
import com.tagcmd.api.mrm.MRMTestConstants;
import com.tagcmd.api.mrm.planning.domain.Planning;
import com.tagcmd.api.mrm.planning.domain.PlanningStatus;
import com.tagcmd.api.mrm.planning.domain.PlanningType;
import com.tagcmd.api.mrm.planning.service.IPlanningService;
import com.tagcmd.api.mrm.util.CommonTestUtils;
import com.tagcmd.api.production.jobroute.domain.PersonSummary;
import com.tagcmd.api.production.jobs.dao.dto.StringAndId;
import com.tagcmd.api.production.jobs.domain.BusinessEntityDTO;
import com.tagcmd.api.production.sourcingcategories.domain.SourcingCategory;
import com.tagcmd.api.production.sourcingcategories.service.impl.SourcingCategoriesService;
import com.tagcmd.api.production.sourcingjobs.domain.ShipTo;
import com.tagcmd.api.production.sourcingjobs.domain.SourcingJob;
import com.tagcmd.api.production.sourcingjobs.domain.SourcingQuantity;
import com.tagcmd.api.production.sourcingtemplates.domain.SourcingTemplate;
import com.tagcmd.api.production.sourcingtemplates.service.impl.SourcingTemplatesService;

/**
 *
 * @author LLitye <LLitye@tagworldwide.com>
 */
public class SourcingJobServiceIntegrationData {

	protected static IPlanningService planningService;
	protected static ICountryService countryService;
	protected static IBusinessEntityService businessEntityService;
	protected static SourcingCategoriesService  sourcingCategoriesService;
	protected static SourcingTemplatesService sourcingTemplatesService;
	
	private static final int SORT_ORDER1 = 1;
	private static final int SORT_ORDER2 = 2;
	private static final int SORT_ORDER3 = 3;
	private static final int COUNT = 10;

	public static String createString(int count) {
		char[] charArray = new char[count];
		Arrays.fill(charArray, '*');
		return new String(charArray);

	}

	static final User USER = new User() {
		{
			setAccountId(17303);
			setSiteId(2);
			setIsAdmin(true);
		}
	};

	static final StringAndId PROJECT = new StringAndId(){
		{
			setName("Luks Project");
			setId(326125);
		}
	};

	static final PersonSummary PERSON_SUMMARY = new PersonSummary(){
		{
			setId(USER.getAccountId());
		}
	};
	
	static final StringAndId SOURCING_TEMPLATE_TYPE = new StringAndId(){
		{
			setId(1);
			setName("Brief");
		}
	};

	public static SourcingJob getBasicSourcingJob() throws Exception {
		SourcingJob sourcingJob = new SourcingJob();
		Planning newPlanning = getPlanningService().createPlanning(USER, SourcingJobServiceIntegrationData.createPlanning());
		StringAndId project = new StringAndId("SourcingJobServiceIntegrationTest Project", newPlanning.getId());
		BusinessEntityDTO customer = new BusinessEntityDTO(USER.getSiteId(), "Customer name");
		BusinessEntityDTO managementUnit = getManagementUnit();
//		BusinessEntityDTO managementUnit = new BusinessEntityDTO(managementUnitID.getId(), managementUnitID.getName());
		sourcingJob.setTitle("Basic SourcingJob " + System.nanoTime());
		sourcingJob.setProject(project);
		sourcingJob.setCustomer(customer);
		sourcingJob.setManagementUnit(managementUnit);
		return sourcingJob;
	}

	static final SourcingJob SOURCING_JOB = new SourcingJob() {
		{
			setTitle("SourcingJobServiceIntegrationTest " + System.nanoTime());
			setJobDescription("SourcingJobServiceIntegrationTest Description" + System.nanoTime());
			setQuoteDueDate(new Date("2020/12/29 08:00:00"));
			setQuantities(sourcingQuantities());
			setShipTos(null);
			setProject(null);
			setCustomer(null);
			setManagementUnit(null);
			setJobNumber(Long.MIN_VALUE);
			setCreatedByUser(PERSON_SUMMARY);
			setAssignedToUser(PERSON_SUMMARY);
			setCreatedDate(new Date());
			setModifiedDate(new Date());
			setStatus(new StringAndId("Draft", 1));
			setBillingType(new StringAndId("NON_BILLABLE_AND_NON_RECOVERABLE", 1));
			setSpecification(null);
			setClientName("Client Name");
			setClientSurname("Client Surname");
			setClientCostCentre("Client CostCenter");
			setArchivedDate(null);
			setSubmittedDate(null);
			setSubmittedUser(null);
			setBillableEntity(null);
			setJobExWorks(true);
			setShipToAddress(false);
			setCountry(new StringAndId("South Africa", 23));
			setNumberOfDrops(5);
		}
	};

	public static Planning createPlanning() {
		Planning planning = new Planning();
		planning.setArchived(false);
		planning.setDescription("Project Description for Sourcing" + System.nanoTime());
		planning.setName("This is a name of my Planning" + System.nanoTime());
		planning.setPlanningType(PlanningType.Project);
		planning.setStartDate(CommonTestUtils.createUTCDateTimeForGivenDate("2016-03-04T00:00:00Z",
				MRMTestConstants.TIMEZONE_EUROPE_LONDON.getName()));
		planning.setEndDate(CommonTestUtils.createUTCDateTimeForGivenDate("2099-03-04T23:59:59Z",
				MRMTestConstants.TIMEZONE_EUROPE_LONDON.getName()));
		planning.setStatus(PlanningStatus.Active);
		planning.setTimezone(MRMTestConstants.TIMEZONE_EUROPE_LONDON);

		return planning;

	}

	static final SourcingQuantity SOURCING_QUANTITY_WITH_QUANTITY_SET_TO_BILLION = new SourcingQuantity() {
		{
			setQuantityId(6);
			setQuantity(100000000000l);
			setVersionId(25);
			setModifiedBy(17303);
			setArchived(false);
			setPosition(SORT_ORDER1);
		}
	};

	public static List<SourcingQuantity> sourcingQuantities(){

		List<SourcingQuantity> sourcingQuantities = new ArrayList<SourcingQuantity>();

		SourcingQuantity sourcingQuantity1 = new SourcingQuantity(1, 501l, 25, 17303, false);
		sourcingQuantity1.setPosition(SORT_ORDER1);
		sourcingQuantities.add(sourcingQuantity1);

		SourcingQuantity sourcingQuantity2 = new SourcingQuantity(2, 502l, 25, 17303, false);
		sourcingQuantity2.setPosition(SORT_ORDER2);
		sourcingQuantities.add(sourcingQuantity2);

		SourcingQuantity sourcingQuantity3 = new SourcingQuantity(2, 502l, 25, 17303, false);
		sourcingQuantity3.setPosition(SORT_ORDER3);
		sourcingQuantities.add(sourcingQuantity3);

		return sourcingQuantities;
	}

	public static List<ShipTo> shipTos(){
	List<ShipTo> shipToList = new ArrayList<ShipTo>();
		ShipTo shipTos = new ShipTo();
		BusinessEntityDTO location = new BusinessEntityDTO(25014, "Delivery Location1");
		shipTos.setLocation(location);
		shipTos.setDeliveryInstruction(SourcingJobServiceIntegrationData.createString(COUNT));
		shipTos.setPackingInstruction(SourcingJobServiceIntegrationData.createString(COUNT));
		shipTos.setShipDate(new Date("2020/12/29 08:00:00"));
		
		ShipTo shipTos2 = new ShipTo();
		BusinessEntityDTO location2 = new BusinessEntityDTO(25015, "Delivery Location2");
		shipTos2.setLocation(location2);
		shipTos2.setDeliveryInstruction(SourcingJobServiceIntegrationData.createString(COUNT));
		shipTos2.setPackingInstruction(SourcingJobServiceIntegrationData.createString(COUNT));
		shipTos2.setShipDate(new Date("2021/12/29 08:00:00"));
		
		ShipTo shipTos3 = new ShipTo();
		BusinessEntityDTO location3 = new BusinessEntityDTO(25016, "Delivery Location3");
		shipTos3.setLocation(location3);
		shipTos3.setDeliveryInstruction(SourcingJobServiceIntegrationData.createString(COUNT));
		shipTos3.setPackingInstruction(SourcingJobServiceIntegrationData.createString(COUNT));
		shipTos3.setShipDate(new Date("2022/12/29 08:00:00"));

		shipToList.add(shipTos);
		shipToList.add(shipTos2);
		shipToList.add(shipTos3);

		return shipToList;
	}

	public static Date getShipDate(List<ShipTo> shipToList, Date shipDate) {
		Date givenShipDate = null;
		if (shipDate == null) {
			givenShipDate = shipToList.get(0).getShipDate();
		} else {
			givenShipDate = shipDate;
		}
		SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
		try {
			return sdf.parse(sdf.format(givenShipDate));
		} catch (ParseException ex) {
			Logger.getLogger(SourcingJobServiceIntegrationTest.class.getName()).log(Level.SEVERE, null, ex);
		}
		return givenShipDate;
	}

	public static BusinessEntityDTO getManagementUnit() throws Exception {
		ResultsWrapper<BusinessEntityDTO> listResultsWrapper = getBusinessEntityService().listBusinessEntitiesByRelationshipType(USER, USER.getSiteId(),
						RelationshipType.Management_Unit_to_Customer, null, false, new Pagination(1, 200));
		List<BusinessEntityDTO> listManagementUnitEntities = listResultsWrapper.getResults();
		return listManagementUnitEntities.get(2);
	}
	
	public static BusinessEntityDTO getBillableEntity() throws Exception {
		
		BusinessEntity be = new BusinessEntity();
		be.setName("Integration Test " + System.nanoTime());
		be.setCategory(new Category(280, "Client Bill-to"));
		be.setParentId(2);

		BusinessEntity savedSiteBusinessEntity = getBusinessEntityService().saveSiteBusinessEntity(be, USER);
		return new BusinessEntityDTO(savedSiteBusinessEntity);
	}

	public static BusinessEntityDTO getShipToLocationId(Integer customerId) {
		List<BusinessEntityDTO> businessEntities = businessEntityService.listAllShipTos(customerId,
				null, false, new Pagination(1, 1000)).getResults();

		return businessEntities.get(0);
	}
	
	public static SourcingTemplate createSourcingTemplate(SourcingCategory sourcingParentCategory, SourcingCategory sourcingChildCategory) {
		
		 SourcingTemplate sourcingTemplate = new SourcingTemplate();
		 sourcingTemplate.setName("Template form IntegrationTest" + System.nanoTime());
		 sourcingTemplate.setCategory(new StringAndId(sourcingParentCategory.getName(), sourcingParentCategory.getId()));
		 sourcingTemplate.setSubCategory(new StringAndId(sourcingChildCategory.getName(), sourcingChildCategory.getId()));
		 sourcingTemplate.setTemplateType(SOURCING_TEMPLATE_TYPE);
		 sourcingTemplate = sourcingTemplatesService.create(USER, sourcingTemplate);
		 return sourcingTemplate;
	}
	
	public static SourcingCategory createParentandSubCategory(SourcingCategory sourcingCategory) {
		
		SourcingCategory sourcingMainCategory = new SourcingCategory();
		if(sourcingCategory == null){
			sourcingMainCategory.setArchived(false);
			sourcingMainCategory.setName("Parent-Categroy IntegrationTest" + System.nanoTime());
			sourcingMainCategory.setParentId(1);
			sourcingMainCategory = sourcingCategoriesService.set(USER, sourcingMainCategory);
		}else if(sourcingCategory.getId() != 0) {
			sourcingMainCategory.setArchived(false);
			sourcingMainCategory.setName("Sub-Category IntegrationTest" + System.nanoTime());
			sourcingMainCategory.setParentId(sourcingCategory.getId());
			sourcingMainCategory = sourcingCategoriesService.set(USER, sourcingMainCategory);
		}
		return sourcingMainCategory;
	}
	
	/*********************** Setter and Getters ***********************************/
	private static IPlanningService getPlanningService() throws Exception {

		if (planningService == null) throw new Exception("Planning service has not been set");
		return SourcingJobServiceIntegrationData.planningService;
	}
    
		private static ICountryService getCountryService() throws Exception {

		if (countryService == null) throw new Exception("Search value has not been set");
		return SourcingJobServiceIntegrationData.countryService;
	}
	public static void setPlanningService(IPlanningService planningService) {
		SourcingJobServiceIntegrationData.planningService = planningService;
	}
	
	public static void setCountryService(ICountryService countryService) {
		SourcingJobServiceIntegrationData.countryService = countryService;
	}

	private static IBusinessEntityService getBusinessEntityService() throws Exception {
		if (businessEntityService == null) throw new Exception("Planning service has not been set");
		return SourcingJobServiceIntegrationData.businessEntityService;
	}

	public static void setBusinessEntityService(IBusinessEntityService businessEntityService) {
		
		SourcingJobServiceIntegrationData.businessEntityService = businessEntityService;
	}
	
	public static SourcingCategoriesService getSourcingCategoriesService() throws Exception {
		if (sourcingCategoriesService == null) throw new Exception("sourcing Categories Service has not been set");
		return sourcingCategoriesService;
	}

	public static void setSourcingCategoriesService(
			SourcingCategoriesService sourcingCategoriesService) {
		SourcingJobServiceIntegrationData.sourcingCategoriesService = sourcingCategoriesService;
	}

	public static SourcingTemplatesService getSourcingTemplatesService() throws Exception {
		if (sourcingTemplatesService == null) throw new Exception("sourcing Templates service has not been set");
		return sourcingTemplatesService;
	}

	public static void setSourcingTemplatesService(
			SourcingTemplatesService sourcingTemplatesService) {
		SourcingJobServiceIntegrationData.sourcingTemplatesService = sourcingTemplatesService;
	}

}